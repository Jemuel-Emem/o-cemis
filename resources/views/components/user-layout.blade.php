<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ALUMNI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none;
        }

        #logo {
            font-family: "Anton", sans-serif;
            font-weight: 600;
            font-size: 30px;
            font-style: normal;
        }

        /* Disable pointer events for the navbar when user is not approved */
        .disabled-links a {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wireUiScripts
</head>

<body class="font-sans antialiased h-screen bg-gradient-to-b from-green-500 to-red-300 justify-center">
    @livewireScripts

    <div class="w-full mx-auto bg-white 2xl:max-w-8xl">

        @if (Auth::check() && !Auth::user()->is_approved)
            <div class="w-full p-4 text-center text-white bg-red-500">
                <p>Your account is pending approval. Please wait for admin approval.</p>
            </div>
        @endif

        <div x-data="{ open: false }" class="relative flex flex-col w-full p-5 mx-auto bg-green-700 md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a class="text-lg tracking-tight text-black uppercase focus:outline-none focus:ring lg:text-2xl" href="/">
                    <span class="lg:text-lg uppercase focus:ring-0 font-bold text-orange-500 flex" id="logo">
                        <img src="{{ asset('images/logona.jpg') }}" alt="Violation Photo" class="w-16 h-16 border-4 mr-2 rounded-full">
                        <label for="" class="text-white text-xl mt-8">Alumni</label>
                    </span>
                </a>
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>


            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                @if (Auth::check() && !Auth::user()->is_approved)

                    <a href="#" class="px-2 py-2 text-sm text-white font-bold lg:px-6 md:px-3 hover:text-cyan-600 lg:ml-auto">
                        Status
                    </a>
                @else

                    <a href="{{ route('user-news') }}" class="px-2 py-2 text-sm text-white font-bold lg:px-6 md:px-3 hover:text-cyan-600 lg:ml-auto" href="#">
                        News and Updates
                    </a>
                    <a href="{{ route('user-status') }}" class="px-2 py-2 text-sm text-white font-bold lg:px-6 md:px-3 hover:text-cyan-600" href="#">
                        Status
                    </a>
                    <a href="{{ route('user-profile') }}" class="px-2 py-2 text-sm text-white font-bold lg:px-6 md:px-3 hover:text-cyan-600" href="#">
                        My Profile
                    </a>
                @endif

                <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                    <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                        <div>
                            <span class="text-white font-bold"> {{ Auth::user()->name }}</span>
                            <x-dropdown>
                                <x-dropdown.item label="Logout" class="" href="{{ route('logout') }}"/>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="relative flex justify-center">
        <div class="border-gray-200 rounded-lg dark:border-gray-700 absolute">
            <main class="">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
