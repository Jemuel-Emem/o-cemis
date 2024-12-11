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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />

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

        .sidebar {
            width: 250px;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wireUiScripts
    @livewireStyles
</head>

<body class="font-sans antialiased h-screen bg-gradient-to-b from-green-800 to-white">
    @livewireScripts

    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full bg-green-700 text-white flex flex-col">
        <div class="flex items-center justify-center h-20 bg-green-900">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logona.jpg') }}" alt="Logo" class="w-12 h-12 rounded-3xl">
                <span id="logo" class="text-green-500 text-2xl">ALUMNI</span>
            </a>
        </div>
        <nav class="flex flex-col px-4 py-6 space-y-4">
            <a href="{{ route('Admindashboard') }}" class="flex items-center px-4 py-2 rounded hover:bg-cyan-600">
                <i class="ri-calendar-check-line text-xl"></i>
                <span class="ml-3 text-sm font-bold">Dashboard</span>
            </a>

            {{-- <a href="{{ route('admin.add-event') }}" class="flex items-center px-4 py-2 rounded hover:bg-cyan-600">
                <i class="ri-calendar-event-line text-xl"></i>
                <span class="ml-3 text-sm font-bold">Events</span>
            </a> --}}
            <a href="{{ route('admin.newregister') }}" class="flex items-center px-4 py-2 rounded hover:bg-cyan-600">
                <i class="ri-calendar-event-line text-xl"></i>
                <span class="ml-3 text-sm font-bold">New Register</span>
            </a>
            <a href="{{ route('adminprofile') }}" class="flex items-center px-4 py-2 rounded hover:bg-cyan-600">
                <i class="ri-file-history-fill text-xl"></i>
                <span class="ml-3 text-sm font-bold">Alumni Profile</span>
            </a>

            <a href="{{ route('admin.add-event') }}" class="flex items-center px-4 py-2 rounded hover:bg-cyan-600">
                <i class="ri-bank-card-fill text-xl"></i>
                <span class="ml-3 text-sm font-bold">News and Update</span>
            </a>

            {{-- <a href="" class="flex items-center px-4 py-2 rounded hover:bg-cyan-600">
                <i class="ri-file-history-fill text-xl"></i>
                <span class="ml-3 text-sm font-bold">Records</span>
            </a> --}}
        </nav>
        <div class="mt-auto px-4 py-4">
            <div class="flex items-center gap-3 justify-center">
                <a href="{{ route('logout') }}">logout</a>
            </div>
        </div>
    </aside>


    <div class="ml-[250px] flex flex-col p-6">
        <div class="border-gray-200 rounded-lg dark:border-gray-700 bg-white p-6 shadow-md">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
