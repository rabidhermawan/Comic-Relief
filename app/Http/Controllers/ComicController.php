<?php

namespace App\Http\Controllers;

use Zip;
use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    // Returns all comics in Database
    public function index() {
        $comics = Comic::orderBy('created_at', 'asc')->get();

        return view('index', ['comics' => $comics]);
    }

    //Show selected comics
    public function details($id) {
        $comic = Comic::findOrFail($id);
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
        $genres = Genre::orderBy('genre')->get();
        return view('comic.upload', ["genres" => $genres]);
    }
    
    public function search() {
        
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'genres' => 'required|string',
            'file' => 'required|file|mimetypes:application/zip,application/x-zip-compressed',
        ]);

        $uploadedFile = $request->file('comicblob');
        $tempZip= Zip::open($uploadedFile->getPathname());

        if (!$tempZip->has('cover.jpg')) {
            
        }


    }
}