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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">

        <nav
            class="sticky inset-0 z-10 block h-max w-full max-w-full rounded-none border border-white/80 bg-white bg-opacity-80 py-2 px-4 text-white shadow-md backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4">
            <div class="flex items-center text-gray-900">
                <a href="{{ url('/') }}"
                    class="mr-4 block cursor-pointer py-1.5 font-sans text-base font-medium leading-relaxed text-inherit antialiased">
                    My Blog
                </a>
                <ul class="ml-auto mr-8 hidden items-center gap-6 lg:flex">
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a class="flex items-center" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a class="flex items-center" href="{{ route('blog_index') }}">
                            bloge
                        </a>
                    </li>
                    @guest
                        <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                        <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">

                            <a class="flex items-center" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        </li>
                    @else
                        <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                            <a href="/profile">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                            <a href="{{ route('logout') }}" class="no-underline hover:underline"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                        </li>
                    @endguest
                </ul>
                {{-- <button
                    class="middle none center hidden rounded-lg bg-gradient-to-tr from-pink-600 to-pink-400 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
                    type="button" data-ripple-light="true">
                    <span>Buy Now</span>
                </button> --}}
                <button
                    class="middle none relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] rounded-lg text-center font-sans text-xs font-medium uppercase text-blue-gray-500 transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
                    data-collapse-target="sticky-navar">
                    <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor"
                            strokeWidth="2">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </span>
                </button>
            </div>

        </nav>

        @yield('content')
    </div>
    @stack('js')
</body>

<div>
    @include('layouts.footer')
</div>

</html>
