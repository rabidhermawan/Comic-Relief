<x-defaultlayout>
    <h1 class="text-center text-5xl font-bold">Welcome!</h1>
    

    <ul class="flex flex-wrap items-center text-center justify-center">
        @foreach ($comics as $comic)
        <li>
            <x-comic-card 
                coversrc="{{ asset('storage/' . $comic->path . '/cover.jpg') }}" 
                title="{{ $comic->title }}"
                href="{{ route('comic.detail', $comic->id) }}"
            />
        </li>
        @endforeach
    </ul>


</x-defaultlayout>