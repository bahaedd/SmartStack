@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Milestone</h1>

    <form method="POST" action="{{ route('milestones.update', $milestone) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block">Title</label>
            <input type="text" name="title" value="{{ $milestone->title }}" required
                class="w-full bg-gray-800 border border-gray-600 rounded p-2 text-white">
        </div>

        <div>
            <label for="description" class="block">Description</label>
            <textarea name="description" class="w-full bg-gray-800 border border-gray-600 rounded p-2 text-white">{{ $milestone->description }}</textarea>
        </div>

        <div>
            <label for="due_date" class="block">Due Date</label>
            <input type="date" name="due_date" value="{{ $milestone->due_date?->format('Y-m-d') }}"
                class="bg-gray-800 border border-gray-600 rounded p-2 text-white">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="completed" value="1" {{ $milestone->completed ? 'checked' : '' }}>
            <label>Completed</label>
        </div>

        <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white">Update</button>
    </form>
@endsection
