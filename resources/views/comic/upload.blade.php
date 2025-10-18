<x-defaultlayout>
    <h1 class="font-bold text-5xl">Upload comics</h1>
    <br><br>
    <form action="{{ route('comic.store') }}" method="POST">
        @csrf

        <label for="comic-title" class="font-bold">Title</label><br>
        <input type="text" id="comic-title" class="border border-gray-500"><br>

        <br>
        
        <label for="comic-description" class="font-bold">Description</label><br>
        <input type="text" id="comic-description" class="border border-gray-500"><br>

        <br>

        <label for="comic-genres" class="font-bold">Genres</label><br>
        <input type="text" id="comic-genres" class="border border-gray-500"><br>        
        <p class="text-gray-500 text-sm" id="file_input_help">Separate each genres with comma, no leading or trailing spaces</p>

        <br>
        <label class="font-bold" for="file_input">Upload file</label><br>
        <input class=" text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file" name="comicblob">
         <p class="text-gray-500 text-sm" id="file_input_help">ZIP format</p>
        <br>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Upload Comic</button>

    </form>
</x-defaultlayout>