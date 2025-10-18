<x-defaultlayout>
        <form action="">
        <label for="comic-title">Title: </label><br>
        <input type="text" id="comic-title" class="border border-gray-500"><br>
        
        <label for="comic-description">Description: </label><br>
        <input type="text" id="comic-description" class="border border-gray-500"><br>

        <label for="comic-description">Description: </label><br>
        <input type="text" id="comic-description" class="border border-gray-500"><br>        
        
        <label for="goodplace_id">Genres:</label>
        @foreach($genres as $genre)
            <p>{{$genre->genre}}</p>
        @endforeach

    </form>
</x-defaultlayout>