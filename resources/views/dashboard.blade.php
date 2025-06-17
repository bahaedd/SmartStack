@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-white mb-2">Welcome to SmartStack</h1>
        <p class="text-gray-400">Your personal development tools hub — pick an app from the sidebar to get started.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card: Goal Tracker -->
        <a href="{{ route('dashboard') }}" class="bg-gray-800 rounded-lg p-6 hover:bg-gray-700 transition">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-white">🎯 Goal Tracker</h2>
                <i class="fas fa-brain text-red-500 text-2xl"></i>
            </div>
            <p class="text-gray-400 mt-2 text-sm">Set, manage and crush your goals efficiently.</p>
        </a>

        <!-- Card: Habit Builder -->
        <a href="#" class="bg-gray-800 rounded-lg p-6 hover:bg-gray-700 transition">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-white">🗓️ Habit Builder</h2>
                <i class="fas fa-calendar text-yellow-500 text-2xl"></i>
            </div>
            <p class="text-gray-400 mt-2 text-sm">Build daily routines and track habits.</p>
        </a>

        <!-- Card: Journal App -->
        <a href="#" class="bg-gray-800 rounded-lg p-6 hover:bg-gray-700 transition">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-white">📝 Journal App</h2>
                <i class="fa-solid fa-newspaper text-blue-400 text-2xl"></i>
            </div>
            <p class="text-gray-400 mt-2 text-sm">Log thoughts, reflections and moments daily.</p>
        </a>
    </div>
@endsection
