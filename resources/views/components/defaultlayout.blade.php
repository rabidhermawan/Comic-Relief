<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comic Stuff</title>

    @vite('resources/css/app.css')
</head>
<body class="max-w-screen">
    @if (session('success'))
    <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
        {{ session('success') }}
    </div>
    @endif
    {{-- Navbar --}}
    <nav class="max-w-screen sticky flex justify-end items-center text-center py-4 px-8 m-6 mb-10 top-0 shadow-md bg-slate-700 text-white z-10">
            <div class="mr-auto h-10 flex"><a href="/">
                <img class="inline-block h-full object-contain" src="{{ asset('storage/images/navbar/Simpsons_Donut.svg')}}" alt="">
                <p class="inline-block">Comic Relief</p>
            </a></div>
            <ul class="flex">
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="/search">Search</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="{{ route('comic.upload') }}">Upload</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="/profile">Profile</a></li>
            </ul>
        </nav> 

    <main class="items-center text-center px-8">
        {{ $slot }}
    </main>
    
</body>
</html>