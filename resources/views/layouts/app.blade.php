<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Flowbite Dashboard') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Flowbite --}}
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-900 text-white overflow-x-hidden">

    {{-- Navbar --}}
    <nav class="fixed top-0 z-50 w-full bg-gray-800 border-b border-gray-700">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center gap-3">
                <button data-drawer-target="main-sidebar" data-drawer-toggle="main-sidebar" aria-controls="main-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0
                            10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010
                            1.5h-7.5a.75.75 0 01-.75-.75zM2
                            10a.75.75 0 01.75-.75h14.5a.75.75 0 010
                            1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ url('/') }}" class="text-white font-bold text-xl">SmartStack</a>
            </div>

            <div class="hidden md:flex justify-center flex-1">
                <input type="text" placeholder="Search"
                    class="w-96 px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none">
            </div>

            <div class="flex items-center gap-4">
                <button class="text-gray-400 hover:text-white"><i class="fas fa-bell"></i></button>
                <button class="text-gray-400 hover:text-white"><i class="fas fa-th"></i></button>
                <button class="text-gray-400 hover:text-white"><i class="fas fa-sun"></i></button>
                <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="w-8 h-8 rounded-full"
                    alt="User Avatar" />
            </div>
        </div>
    </nav>

    {{-- Sidebar --}}
    <aside id="main-sidebar"
        class="fixed top-0 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-800"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto text-white">
            <ul class="space-y-2 pt-18">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                        <i class="fas fa-brain text-red-500 w-5 h-5"></i>
                        <span class="ms-3">Goal Tracker</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                        <i class="fas fa-calendar text-yellow-600 w-5 h-5"></i>
                        <span class="ms-3">Habit Builder</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                        <i class="fa-solid fa-newspaper text-blue-600 w-5 h-5"></i>
                        <span class="ms-3">Journal App</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                        <i class="fa-solid fa-hourglass text-green-500 w-5 h-5"></i>
                        <span class="ms-3">Mindfulness Timer</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                        <i class="fa-solid fa-list-check text-indigo-400 w-5 h-5"></i>
                        <span class="ms-3">Life Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                        <i class="fa-solid fa-trophy text-fuchsia-700 w-5 h-5"></i>
                        <span class="ms-3">Milestone Map</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="pt-16 sm:ml-56 transition-all duration-300 p-6">
        @yield('content')
    </main>

    @yield('scripts')
    <livewire:scripts />
</body>

</html>
