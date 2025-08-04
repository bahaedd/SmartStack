@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto"> {{-- ⬅️ Centered and constrained width --}}
        <div class="mb-6 mt-12">
            <h1 class="text-2xl font-bold">Edit Goal</h1>
        </div>

        <form action="{{ route('goals.update', $goal) }}" method="POST" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-200">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                    value="{{ old('title', $goal->title) }}" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-200">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none">{{ old('description', $goal->description) }}</textarea>
            </div>

            <div>
                <label for="due_date" class="block text-sm font-medium text-gray-200">Due Date</label>
                <input type="date" name="due_date" id="due_date"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                    value="{{ old('due_date', $goal->due_date ? $goal->due_date->format('Y-m-d') : '') }}">
            </div>

            <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                <input id="completed" type="checkbox" name="completed" value="1"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    {{ $goal->completed ? 'checked' : '' }}>
                <label for="completed" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mark as
                    completed</label>
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg">
                <i class="fas fa-save mr-1"></i> Update
            </button>
        </form>
    </div>
@endsection
