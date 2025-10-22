{{-- <div class="aspect-2/3 text-center items-center bg-blue-300 pb-3 m-6  rounded-xl border-1 border-solid border-gray-500"><a href="{{ $href }}">
    <img class="h-full object-contain w-50" src="{{ $coversrc }}" alt="">
    <p>{{ $title }}</p>
</a></div> --}}

<a href="{{ $href }}"><div class="relative w-60 aspect-2/3 bg-cover bg-center rounded-xl transition ease-out duration-500 shadow-2xl hover:shadow-blue-300 mx-5 my-8" style="background-image: url('{{ $coversrc }}')">  
    <div class="absolute inset-x-0 bottom-0 p-2 rounded-b-xl bg-gray-700/50 text-white wrap-anywhere">
        <p class="font-sans font-size-2xl text-lg">{{ $title }}</p>
    </div>
</div>
</a>