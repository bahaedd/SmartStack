<aside id="main-sidebar"
    class="fixed top-16 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-800"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto text-white">
        <ul class="space-y-2 pt-18">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-gauge text-violet-500 w-5 h-5"></i>
                    <span class="ms-3 font-md font-semibold">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/goals" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-brain text-red-500 w-5 h-5"></i>
                    <span class="ms-3 font-md font-semibold">Goal Tracker</span>
                </a>
            </li>
            <li>
                <a href="/habits" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-calendar text-yellow-600 w-5 h-5"></i>
                    <span class="ms-3 font-md font-semibold">Habit Builder</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-newspaper text-blue-600 w-5 h-5"></i>
                    <span class="ms-3 font-md font-semibold">Journal App</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-hourglass text-green-500 w-5 h-5"></i>
                    <span class="ms-3 font-md font-semibold">Mindfulness Timer</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-list-check text-indigo-400 w-5 h-5"></i>
                    <span class="ms-3 font-md font-semibold">Life Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-trophy text-fuchsia-700 w-5 h-5"></i>
                    <span class="ms-3 font-md font-semibold">Milestone Map</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
