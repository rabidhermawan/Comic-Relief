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
    

<nav class="border-gray-200 bg-gray-900">
  <div class="sticky top-0 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ Storage::url('images/logo-white-full.svg')}}" class="h-8" alt="Flowbite Logo" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="items-center font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
        <li>
          <a href="{{ route('comic.search') }}" class="block py-2 px-3  rounded-sm md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:dark:hover:bg-transparent">Search</a>
        </li>
        
        @guest
        <li>
          <a href="{{ route('auth.loginPage') }}"><x-blue-submit-btn text="Login"/></a>
        </li>
        @endguest
        @auth
        <li>
          <a href="{{ route('comic.upload') }}" class="block py-2 px-3  rounded-sm md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:dark:hover:bg-transparent">Upload</a>
        </li>
        <li>
          <span class="block font-extrabold py-2 px-3  rounded-sm md:hover:bg-transparent md:border-0 md:p-0 text-white hover:bg-gray-700 hover:text-white md:dark:hover:bg-transparent">Welcome, {{Auth::user()->name}}</span>
        </li>
        <li>
          <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
          @csrf
            <x-red-submit-btn text="Logout"/>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
    <main class="items-center text-center pt-8 px-8 pb-8">
        {{ $slot }}
    </main>
    <footer class="font-mono mt-5 m-10 items-center text-center text-lg">
            © 2025 R. Abid Hermawan
    </footer>
    
</body>
</html>