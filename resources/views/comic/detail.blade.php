<x-defaultlayout>
    <div class="flex items-start justify-center">
        <div class="aspect-2/3 min-w-50 max-w-85">
            <img src="{{ asset('storage/' . $comic->path . '/cover.jpg') }}" alt="">
        </div>
        <div class="bg-blue-200 text-left min-w-100 max-w-150">
            <h1>Comic - #{{ $comic->id }}</h1>
            <h1>Title : {{ $comic->title }}</h1>
    
            <br>
            <p>Description : {{ $comic->description }}</p>
            <br>
            <h1>Created at : {{ $comic->created_at }}</h1>
            <h1>Updated at : {{ $comic->updated_at }}</h1>
        </div>
        <div>
            
        </div>
    </div>

    <p>Hello!</p>
    
</x-defaultlayout>