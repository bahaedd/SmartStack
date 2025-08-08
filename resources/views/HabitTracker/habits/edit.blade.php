@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 mt-12">
            <h1 class="text-2xl font-bold">Edit Habit</h1>
        </div>

        <form action="{{ route('habits.update', $habit) }}" method="POST" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-200">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                    value="{{ old('title', $habit->title) }}" required>
            </div>

            <div>
                <label for="frequency" class="block text-sm font-medium text-gray-200">Frequency</label>
                <select name="frequency" id="frequency"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                    required>
                    <option value="daily" {{ $habit->frequency === 'daily' ? 'selected' : '' }}>Daily</option>
                    <option value="weekly" {{ $habit->frequency === 'weekly' ? 'selected' : '' }}>Weekly</option>
                </select>
            </div>

            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-200">Start Date</label>
                <input type="date" name="start_date" id="start_date"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                    value="{{ old('start_date', $habit->start_date ? \Carbon\Carbon::parse($habit->start_date)->format('Y-m-d') : '') }}"
                    required>
            </div>

            <div>
                <label for="goal_days" class="block text-sm font-medium text-gray-200">Goal Days</label>
                <input type="number" name="goal_days" id="goal_days" min="1"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"
                    value="{{ old('goal_days', $habit->goal_days) }}">
            </div>

            <div>
                <label for="notes" class="block text-sm font-medium text-gray-200">Notes</label>
                <textarea name="notes" id="notes" rows="4"
                    class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none">{{ old('notes', $habit->notes) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-1"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
