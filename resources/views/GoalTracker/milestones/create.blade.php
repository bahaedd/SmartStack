@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add Milestone to: {{ $goal->title }}</h1>

    <form method="POST" action="{{ route('goals.milestones.store', $goal) }}" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block">Title</label>
            <input type="text" name="title" required
                class="w-full bg-gray-800 border border-gray-600 rounded p-2 text-white">
        </div>

        <div>
            <label for="description" class="block">Description</label>
            <textarea name="description" class="w-full bg-gray-800 border border-gray-600 rounded p-2 text-white"></textarea>
        </div>

        <div>
            <label for="due_date" class="block">Due Date</label>
            <input type="date" name="due_date" class="bg-gray-800 border border-gray-600 rounded p-2 text-white">
        </div>

        <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white">Save</button>
    </form>
@endsection
