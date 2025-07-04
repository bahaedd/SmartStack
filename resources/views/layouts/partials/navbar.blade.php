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
            <!-- Profile Dropdown -->
            <div class="relative">
                <button id="user-menu-button" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom-end"
                    class="flex text-sm bg-gray-800 rounded-full focus:ring-2 focus:ring-gray-600 dark:focus:ring-gray-600"
                    type="button">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="{{ Auth::user()->profile_photo_url ?? 'https://flowbite.com/docs/images/people/profile-picture-5.jpg' }}"
                        alt="user photo">
                </button>

                <!-- Dropdown menu -->
                <div id="user-dropdown"
                    class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 absolute right-0 mt-2">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>Hi, {{ Auth::user()->name }} !</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile
                                Settings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>
