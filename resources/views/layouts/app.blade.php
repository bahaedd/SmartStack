<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Flowbite Dashboard') }}</title>
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
    @include('layouts.partials.navbar')

    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    {{-- Main Content --}}
    <main class="pt-16 sm:ml-56 transition-all duration-300 p-6">
        @yield('content')
    </main>

    @yield('scripts')
    <livewire:scripts />
</body>

</html>
