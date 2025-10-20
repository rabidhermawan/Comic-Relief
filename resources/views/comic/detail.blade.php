<x-defaultlayout>
    <div class="flex items-start justify-center">
        {{-- Cover Image --}}
        <div class="aspect-2/3 min-w-50 max-w-85">
            <img src="{{ Storage::url($comic->path.'/cover.jpg') }}" alt="">
        </div>

        {{-- Comic Details --}}
        <div class="bg-blue-200 text-left min-w-100 max-w-150">
            <p>Comic - #{{ $comic->id }}</p>
            <h1 class="font-bold uppercase">{{ $comic->title }}</h1>
    
            <br>
            <p>Description : {{ $comic->description }}</p>
            <br>
            <p>Uploaded by : {{ $comic->user->name }}</p>
            <br>
            <p>Genres : </p>
            <ol>
                @foreach ($comic->genres as $genre)
                    <li>- {{$genre->genre}}</li>
                @endforeach
            </ol>

            <br>
            <p>Page count : {{ $comic->page_count }} </p>
            <br>
            <p>Created at : {{ $comic->created_at }}</p>
            <p>Updated at : {{ $comic->updated_at }}</p>

            {{-- Delete Comic --}}
            @auth
            @if (Auth::id() === $comic->user->id )
                <form action="{{ route('comic.delete', $comic->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Delete</button>
                </form>

                {{-- Update Comic --}}
                <a href="{{ route('comic.update', $comic->id) }}"><button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Update</button></a>
            @endif
            @endauth

            
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