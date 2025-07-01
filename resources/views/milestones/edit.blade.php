@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 mt-12">
            <h1 class="text-2xl font-bold">Edit Milestone</h1>
        </div>

        <form method="POST" action="{{ route('milestones.update', $milestone) }}"
            class="space-y-6 bg-gray-800 p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block">Title</label>
                <input type="text" name="title" value="{{ $milestone->title }}" required
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none">
            </div>

            <div>
                <label for="description" class="block">Description</label>
                <textarea name="description"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none">{{ $milestone->description }}</textarea>
            </div>

            <div>
                <label for="due_date" class="block">Due Date</label>
                <input type="date" name="due_date" value="{{ $milestone->due_date?->format('Y-m-d') }}"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none">
            </div>

            <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                <input id="completed" type="checkbox" name="completed" value="1"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    {{ $milestone->completed ? 'checked' : '' }}>
                <label for="completed" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checked
                    state</label>
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg">
                <i class="fas fa-save mr-1"></i> Update
            </button>
        </form>
    </div>
@endsection
