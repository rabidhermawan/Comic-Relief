<x-defaultlayout>
    <div class="bg-amber-200 flex flex-wrap max-w-3/4 justify-center">
        <h1>{{ $comic->title }}</h1>
        
        @foreach ($pages as $page)
        <div class="">
            <img src="{{ asset('storage/' . $comic->path . '/pages/' . $page->filename) }}" alt="Page {{ $page->page_number }}">
        </div>
        
        @endforeach

        <div class="mt-4">
            {{ $pages->links() }}
        </div>
    </div>
</x-defaultlayout>