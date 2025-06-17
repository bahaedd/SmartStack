<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Flowbite Dashboard') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-900 text-white" x-data="{ sidebarOpen: true }">

    {{-- Top Navbar --}}
    <nav class="fixed top-0 z-50 w-full bg-gray-800 border-b border-gray-700">
        <div class="flex items-center justify-between px-4 py-3">
            {{-- Left: Toggle + Logo --}}
            <div class="flex items-center flex-1">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-400 hover:text-white focus:outline-none">
                    <i class="fas fa-bars text-blue-700"></i>
                </button>
                <a href="{{ url('/') }}" class="flex items-center ml-3 text-white font-bold text-xl">
                    SmartStack
                </a>
            </div>
            {{-- Center: Search Bar --}}
            <div class="hidden md:flex justify-center flex-1">
                <input type="text" placeholder="Search"
                    class="w-96 px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none">
            </div>
            {{-- Right: Icons --}}
            <div class="flex items-center justify-end flex-1 gap-4">
                <button class="text-gray-400 hover:text-white"><i class="fas fa-bell"></i></button>
                <button class="text-gray-400 hover:text-white"><i class="fas fa-th"></i></button>
                <button class="text-gray-400 hover:text-white"><i class="fas fa-sun"></i></button>
                <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="w-8 h-8 rounded-full"
                    alt="User Avatar" />
            </div>
        </div>
    </nav>

    {{-- Sidebar --}}
    <aside :class="sidebarOpen ? 'w-56' : 'w-16'"
        class="fixed top-0 left-0 z-40 transition-all duration-300 h-screen pt-16 bg-gray-800 text-white overflow-hidden">
        <ul class="space-y-2 px-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 mt-6 rounded hover:bg-gray-700">
                    <i class="fas fa-brain text-md text-red-500"></i>
                    <span x-show="sidebarOpen" class="ml-2 transition-opacity duration-300 font-semibold">Goal
                        Tracker</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-calendar text-md text-yellow-600"></i>
                    <span x-show="sidebarOpen" class="ml-2 transition-opacity duration-300 font-semibold">Habit
                        Builder</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-newspaper text-md text-blue-600"></i>
                    <span x-show="sidebarOpen" class="ml-2 transition-opacity duration-300 font-semibold">Journal
                        App</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-hourglass text-md text-green-500"></i>
                    <span x-show="sidebarOpen" class="ml-2 transition-opacity duration-300 font-semibold">Mindfulness
                        Timer</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-list-check text-md text-indigo-400"></i>
                    <span x-show="sidebarOpen" class="ml-2 transition-opacity duration-300 font-semibold">Life
                        Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-trophy text-md text-fuchsia-700"></i>
                    <span x-show="sidebarOpen" class="ml-2 transition-opacity duration-300 font-semibold">Milestone
                        Map</span>
                </a>
            </li>
        </ul>
    </aside>

    {{-- Main Content --}}
    <div class="flex pt-16">
        <main :class="sidebarOpen ? 'ml-56' : 'ml-16'" class="flex-1 transition-all duration-300 p-6">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
</body>

</html>
