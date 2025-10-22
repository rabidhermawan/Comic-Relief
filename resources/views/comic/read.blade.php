<x-defaultlayout>    
    <div class="flex flex-wrap justify-center relative">
        @foreach ($pages as $page)
        @if ($pages->currentPage() > 1)
                <a href="{{ route('comic.read', ['id' => $comic->id, 'page_number' => $pages->currentPage() - 1]) }}"
                   class="absolute top-0 left-0 w-1/2 h-full z-10"
                   aria-label="Previous Page">
                </a>
            @endif
        
            @if ($pages->currentPage() < $pages->lastPage())
                <a href="{{ route('comic.read', ['id' => $comic->id, 'page_number' => $pages->currentPage() + 1]) }}"
                   class="absolute top-0 right-0 w-1/2 h-full z-10"
                   aria-label="Next Page">
                    {{-- This link is invisible but covers the right 50% --}}
                </a>
            @endif
        <div class="aspect-2/3 max-h-screen">
            <img class="pagetoread " src="{{ Storage::url($comic->path.'/pages/'.$page->filename) }}" alt="Page {{ $page->page_number }}">
        </div>        
        @endforeach

        
    </div>
    
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

    <script>
        window.addEventListener('load', function() {
            document.querySelector(".pagetoread")?.scrollIntoView();
        });
    </script>
</x-defaultlayout>