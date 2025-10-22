<x-defaultlayout>
    <h1 class="font-bold text-5xl">Update {{ $comics->title }} </h1>
    <br><br>
    <form action="{{ route('comic.pushUpdate', $comics->id) }}" method="POST">
        @csrf

        <x-forminput-text use="Title" help=""/><br>
        <x-forminput-text use="Description" help=""/><br>
        <x-forminput-text use="Genres" help="Separate your genres with commas"/>
        <br>
        <br>

        <br>

        <x-blue-submit-btn text="Update"/>
    </form>

    @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</x-defaultlayout>