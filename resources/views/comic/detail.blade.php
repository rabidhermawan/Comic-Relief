<x-defaultlayout>
    <div class="flex items-start justify-center">
        <div class="aspect-2/3 min-w-50 max-w-85">
            <img src="{{ Storage::url($comic->path.'/cover.jpg') }}" alt="">
        </div>
        <div class="bg-blue-200 text-left min-w-100 max-w-150">
            <p>Comic - #{{ $comic->id }}</p>
            <h1 class="font-bold uppercase">{{ $comic->title }}</h1>
    
            <br>
            <p>Description : {{ $comic->description }}</p>
            <br>
            <p>Genres : </p>
            <ol>
                @foreach ($genres as $genre)
                    <li>- {{$genre->genre}}</li>
                @endforeach
            </ol>

            <br>
            <p>Page count : {{ $comic->page_count }} </p>
            <br>
            <p>Created at : {{ $comic->created_at }}</p>
            <p>Updated at : {{ $comic->updated_at }}</p>
        </div>
    </div>

    <br>

    <div class="bg-amber-100 max-w-500 justify-center items-center">
        <ul class="flex flex-wrap items-center text-center justify-center">
        @foreach ($pages as $page)
            <li>
                <div class="aspect-2/3 max-w-35 mx-3"><a href="{{ route('comic.read', ['id' => $comic->id, 'page_number' =>$page->page_number]) }}"">
                    <img src="{{ Storage::url($comic->path.'/pages/'.$page->filename) }}" alt="">
                    <p>Page - {{ $page->page_number }}</p>
                </a></div>
            </li>
            @endforeach
        </ul>

    </div>
    
</x-defaultlayout>