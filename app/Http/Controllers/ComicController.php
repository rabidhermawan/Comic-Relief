<?php

namespace App\Http\Controllers;

use Zip;
use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ComicController extends Controller
{
    // Returns all comics in Database
    public function index() {
        $comics = Comic::orderBy('created_at', 'asc')->get();

        return view('index', ['comics' => $comics]);
    }

    //Show selected comics
    public function details(Comic $comic) {
        $pages = $comic->pages()->orderBy('page_number')->get();
        $genres = $comic->genres()->orderBy('genre')->get();
        return view('comic.detail', ["comic" => $comic, "pages" => $pages, "genres" => $genres]);
    }

    public function read($id, $page_number) {
        $comic = Comic::findOrFail($id);
        $pages = $comic->pages()->orderBy('page_number')->paginate(1);
        return view('comic.read', ["comic" => $comic, "pages" => $pages]);
    }


    // Create comic entry, should calls ComicPage model too (WIP man.....)
    public function upload() {
        return view('comic.upload');
    }
    
    public function search() {
        $comics = NULL;
        return view('comic.search', ['comics' => $comics]);
    }

    public function getSearch(Request $request) {
        $comics = Comic::where('title', 'ilike', '%' . $request->searchquery . '%' )->paginate(25);
        return view('comic.search', ['comics' => $comics]);
    }

    public function store(Request $request) {
        // Check if the genres inputted are in the database
        $inputtedGenres = array_map('trim', explode(',', $request->input('genres')));
        $request->merge(['genres' => $inputtedGenres]);
        
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'genres' => 'required|array|min:1',
            'genres.*' => 'exists:genres,genre',
            'file' => 'required|file|mimes:zip',
        ]);

        DB::transaction(function () use ($validated, $request, $inputtedGenres) {
            // Check file if it contains the bare minimum to be a comic
            // Store the uploaded zip file in temporary folder
            // Temp is defined in the config/filesystems.php btw
            $uploadedFileTempName = $request->file('file')->store('','temp');
            $tempZip= Zip::open(Storage::disk('temp')->path($uploadedFileTempName));

            if (!$tempZip->has('cover.jpg') ||
                !$tempZip->has('cover-small.jpg') &&
                !$tempZip->has('pages/1.jpg')) {
            
                Storage::disk('temp')->delete($uploadedFileTempName);
                return back()->withErrors('ZIP doesn\'t contains either cover and/or its small version or a page');
            }
            
            //Create entry in comic
            $insertedComic = Comic::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'path' => 'placeholder',
                'page_count' => 10,
            ]);

            // Attach genres to the entry
            $genreIds = Genre::whereIn('genre', $validated['genres'])->pluck('id');
            $insertedComic->genres()->attach($genreIds);

            // Iterate through the items to create entries in the database
            $tempZipContents = $tempZip->listFiles();
            sort($tempZipContents, SORT_NATURAL | SORT_FLAG_CASE); //Sorts through the files following number (1.jpg, 10.jpg, 100.jpg)

            // Paths of a comic should always be the assigned id
            $insertedComicPagesPath = Storage::url(strval($insertedComic->id). '/pages/');

            $pageCount = -1; 
            foreach ($tempZipContents as $fileInZip){
                if (str_starts_with($fileInZip, 'pages/') && strcmp($fileInZip, 'pages/') !== 0){
                    // Clean the parent directory first
                    $cleanedFilename = str_replace('pages/', '', $fileInZip);
                    $pageNum = intval($cleanedFilename);

                    $insertedComic->pages()->create([
                        'comic_id' => $insertedComic->id,
                        'page_number' => $pageNum,
                        'filename' => $cleanedFilename,
                    ]);
                    $pageCount += 1;
                }
            }

            // Unzip the file
            $extractedPath = Storage::disk('public')->path(strval($insertedComic->id));
            Storage::makeDirectory('public/' . $extractedPath);
            $tempZip->extract($extractedPath);

            //Delete temp file
            Storage::disk('temp')->delete($uploadedFileTempName);
            // Update the comic row
            $insertedComic->update([
                'path' => strval($insertedComic->id),
                'page_count' => $pageCount,
            ]);

        });

        return redirect()->route('comic.index')->with('success', $request->title . ' was successfully uploaded!');

        
    }

    public function delete(Comic $comic) {
        $comicTitle = $comic->title;
        $comic->delete();

        return redirect()->route('comic.index')->with('success', $comicTitle . ' was successfully deleted!');
    }
}