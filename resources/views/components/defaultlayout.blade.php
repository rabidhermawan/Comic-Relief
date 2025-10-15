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
    {{-- Navbar --}}
    <nav class="max-w-screen sticky flex justify-end items-center text-center py-4 px-8 m-6 mb-10 top-0 shadow-md bg-slate-700 text-white z-10">
            <div class="mr-auto h-10 flex"><a href="">
                <img class="inline-block h-full object-contain" src="{{ asset('storage/images/navbar/Simpsons_Donut.svg')}}" alt="">
                <p class="inline-block">Comic Relief</p>
            </a></div>
            <ul class="flex">
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/hometown.html">Hometown</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/food.html">Foods</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/tourist.html">Tourist</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/profile.html">Profile</a></li>
            </ul>
        </nav> 

    <main class="items-center bg-red-500 m-6">
        {{ $slot }}
    </main>
    
</body>
</html>