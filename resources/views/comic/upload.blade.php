<x-defaultlayout>
    <h1 class="font-bold text-5xl">Upload comics</h1>
    <br><br>
    <form action="{{ route('comic.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <x-forminput-text use="Title" help=""/><br>
        <x-forminput-text use="Description" help=""/><br>
        <x-forminput-text 
            use="Genres" 
            help="Separate your genres with commas"
            />
        <br>
        <br>

        <label class="font-bold" for="file_input">Upload file</label><br>
        <input class=" text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" 
            id="file_input" 
            type="file" 
            name="file"
        >
        <p class="text-gray-500 text-sm" id="file_input_help">ZIP format</p>
        
        <br>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Upload Comic</button>
    </form>

    @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</x-defaultlayout>