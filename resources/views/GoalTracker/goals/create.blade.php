@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Create New Goal</h1>
    </div>

    <form action="{{ route('goals.store') }}" method="POST" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-200">Title</label>
            <input type="text" name="title" id="title"
                class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-200">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="due_date" class="block text-sm font-medium text-gray-200">Due Date</label>
            <input type="date" name="due_date" id="due_date"
                class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                value="{{ old('due_date') }}">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg">
            <i class="fas fa-save mr-1"></i> Save Goal
        </button>
    </form>
@endsection
