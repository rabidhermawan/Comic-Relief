<x-defaultlayout>
    <form action="{{ route('comic.getSearch') }}" method="GET">
        <x-forminput-text use="searchquery"/> <br>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Search</button>
    </form>

    @if (!empty($comics))
    <ul class="flex flex-wrap items-center text-center justify-center">
        @foreach ($comics as $comic)
        <li>
            <x-comic-card 
                coversrc="{{ Storage::url($comic->path .'/cover-small.jpg') }}" 
                title="{{ $comic->title }}"
                href="{{ route('comic.detail', $comic->id) }}"
            />
        </li>
        @endforeach
    </ul>

    <div class="mt-4">
        {{ $comics->links() }}
    </div>
    @endif

</x-defaultlayout>