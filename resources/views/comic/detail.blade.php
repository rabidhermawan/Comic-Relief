<x-defaultlayout>
    <div class="inline-block rounded-2xl border-2 border-solid border-gray-300 p-5">
        {{-- Cover Image --}}
        <div class="inline-block p-5 aspect-2/3 max-w-85 mr-10">
            <img src="{{ Storage::url($comic->path.'/cover.jpg') }}" alt="">
        </div>

        {{-- Comic Details --}}
        <div class="inline-block align-top text-left min-w-100 max-w-150 p-5">
            <p>Comic - #{{ $comic->id }}</p>
            <h1 class="font-bold uppercase text-5xl">{{ $comic->title }}</h1>
    
            <br>
            <p>{{ $comic->description }}</p>
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
            <br>
            {{-- Delete Comic --}}
            
            @auth
            <div class="grid grid-cols-2 items-center">
            @if (Auth::id() === $comic->user->id )
                <form action="{{ route('comic.delete', $comic->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <x-red-submit-btn text="Delete"/>
                </form>

                {{-- Update Comic --}}
                <form action="{{ route('comic.update', $comic->id) }}">
                    @csrf
                    <x-blue-submit-btn text="Update"/>
                </form>
                
            @endif
            </div>
            @endauth

            </div>            
        </div>
    </div>

    <br>
    
    <h2 class="m-5 text-2xl font-bold font-sans">Pages</h2>

    <div class="inline-block p-5 rounded-2xl border-2 border-solid border-gray-300">
        <ul class="flex flex-wrap items-center text-center justify-center">
            @foreach ($pages as $page)
            <li>
                <div class="aspect-2/3 max-w-35 m-5"><a href="{{ route('comic.read', ['id' => $comic->id, 'page_number' => $page->page_number]) }}"">
                    <img src="{{ Storage::url($comic->path.'/pages/'.$page->filename) }}" alt="">
                </a></div>
            </li>
            @endforeach
        </ul>

    </div>
    
</x-defaultlayout>