@extends('layouts.app')

@section('content')
    <div class="mb-6">
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

        <div class="flex items-center gap-2">
            <input type="checkbox" name="completed" id="completed" value="1" {{ $goal->completed ? 'checked' : '' }}>
            <label for="completed" class="text-sm text-gray-300">Mark as completed</label>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg">
            <i class="fas fa-save mr-1"></i> Update Goal
        </button>
    </form>
@endsection
