<x-defaultlayout>
    <div class="bg-amber-200 flex flex-wrap max-w-3/4 justify-center">
        <h1>{{ $comic->title }}</h1>
        
        @foreach ($pages as $page)
        <div class="">
            <img src="{{ Storage::url($comic->path.'/pages/'.$page->filename) }}" alt="Page {{ $page->page_number }}">
        </div>
        
        @endforeach

        <div class="mt-4 flex gap-2 justify-center">
             @if ($pages->currentPage() > 1)
                <a href="{{ route('comic.read', ['id' => $comic->id, 'page_number' => $pages->currentPage() - 1]) }}" class="px-3 py-1 bg-gray-200 rounded">
                    Previous
                </a>
            @endif

            @foreach ($pages->getUrlRange(1, $pages->lastPage()) as $page => $url)
                <a href="{{ route('comic.read', ['id' => $comic->id, 'page_number' => $page]) }}" class="px-3 py-1 rounded {{ $page == $pages->currentPage() ? 'bg-blue-500 text-white font-bold' : 'bg-gray-200' }}">
                    {{ $page }}
                </a>
            @endforeach

            @if ($pages->currentPage() < $pages->lastPage())
                <a href="{{ route('comic.read', ['id' => $comic->id, 'page_number' => $pages->currentPage() + 1]) }}" class="px-3 py-1 bg-gray-200 rounded">
                    Next
                </a>
            @endif
        </div>
    </div>
</x-defaultlayout>