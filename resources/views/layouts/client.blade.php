<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <div class=" bg-white">
            <nav class="drop-shadow-xl border-b-[1px] border-slate-400">
                <div class="flex flex-row justify-between items-center bg-transparent">
                    <div class="px-4 py-2">
                        <a href="{{ url('/home') }}">
                            <img src="{{URL::asset('/image/logo.png')}}" href="{{ route('client.test') }}"
                                class="w-[70px]"
                            >
                        </a>
                    </div>
                    <div class="flex flex-row mr-3">
                        <a class="text-lg py-2 px-4 text-slate-800" href="{{ url('/home') }}">
                            HOME
                        </a>
                        <a class="text-lg py-2 px-4 text-slate-800" href="{{ url('/manual') }}">
                            MANUAL
                        </a>
                        <a class="text-lg py-2 px-4 text-slate-800" href="{{ route('admin.results.index') }}">
                            SET SCORE
                        </a>
                        
                    </div>
                    <div class="">
                        <h5 class="flex flex-row">
                            @auth
                                <div class="mr-5 ">
                                    <a class="text-lg text-slate-50 py-2 px-4 font-thin bg-slate-800 hover:font-bold  transition duration-300 ease-in" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                                        Logout
                                    </a>
                                </div>
                            @else
                            <div class="mr-5 ">
                                <a class="text-lg text-slate-50 py-2 px-4 font-thin bg-slate-800 hover:font-bold  transition duration-300 ease-in" href="{{ route('login') }}">
                                    Login
                                </a>
                            </div>
                            @endauth
                        </h5>
                        <form class="" action="{{ route('logout') }}" id="logout-form" method="post">
                            @csrf
                        </form>
                    </div>
                    {{-- <div class="md:hidden flex items-center">
                        <button class="outline-none mobile-menu-button">
                            <svg class=" w-6 h-6 text-gray-500 hover:text-green-500 "
                                x-show="!showMenu"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="hidden mobile-menu">
                        <ul class="">
                            <li><a href="{{ url('/home') }}" class="block text-sm px-2 py-4 font-semibold">HOME</a></li>
                            <li><a href="{{ url('/manual') }}" class="block text-sm px-2 py-4 transition duration-300">MANUAL</a></li>
                            <li><a href="{{ route('admin.results.index') }}" class="block text-sm px-2 py-4 transition duration-300">SET SCORE</a></li>
                            <li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}" class="block text-sm px-2 py-4 transition duration-300">LOGOUT</a></li>
                        </ul>
                    </div> --}}
        
                </div>
            </nav>

            
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
                    <script>
                        const btn = document.querySelector("button.mobile-menu-button");
                        const menu = document.querySelector(".mobile-menu");
        
                        btn.addEventListener("click", () => {
                            menu.classList.toggle("hidden");
                        });
                    </script>

</html>