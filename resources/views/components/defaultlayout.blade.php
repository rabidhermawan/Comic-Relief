<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comic Stuff</title>

    @vite('resources/css/app.css')
</head>
<body>
    <nav class="max-w-screen flex justify-end bg-orange-500">
        <div class="flex mr-auto"><a href="">
            <img src="{{ asset('storage/Simpsons_Donut.svg')}}" alt="">
            <p>Comic Relief</p>
        </a></div>

        <div class="flex"><ul>
            <li><a href="">Comic List</a></li>
            <li><a href="">Search by Cover</a></li>
        </ul></div>
    </nav>
    
    <nav class="max-w-screen sticky flex justify-end items-center text-center py-4 px-8 m-6 mb-10 top-0 shadow-md bg-emerald-50 z-10">
            <p class="mr-auto font-rocksalt font-bold text-2xl hover:text-red-400 transition ease-out duration-150"><a href="index.html">Abid H.</a></p>
            <ul class="flex">
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/hometown.html">Hometown</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/food.html">Foods</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/tourist.html">Tourist</a></li>
                <li class="line-block pr-5 font-plexmono tracking-tighter text-2xl hover:text-sky-400 transition ease-out duration-150"><a class="textFade" href="quiz1/profile.html">Profile</a></li>
            </ul>
        </nav> 

    <main class="container">
        {{ $slot }}
    </main>
    
</body>
</html>