@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-8 p-6 bg-gray-800 shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">{{ $habit->name }}</h1>

        <div class="mb-4">
            <p class="text-gray-400"><span class="font-semibold">Description:</span>
                {{ $habit->description ?? 'No description provided.' }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-400"><span class="font-semibold">Frequency:</span> {{ ucfirst($habit->frequency) }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-400"><span class="font-semibold">Start Date:</span>
                {{ $habit->start_date ? \Carbon\Carbon::parse($habit->start_date)->format('Y-m-d') : '' }}</p>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('habits.edit', $habit) }}"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg">Edit</a>
            <form action="{{ route('habits.destroy', $habit) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this habit?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg">Delete</button>
            </form>
        </div>
    </div>
@endsection
