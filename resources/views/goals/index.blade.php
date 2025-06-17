@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Your Goals</h1>
            <a href="{{ route('goals.create') }}"
                class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg">
                <i class="fas fa-plus mr-1"></i> New Goal
            </a>
        </div>
    </div>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-700 rounded text-white">
            {{ session('success') }}
        </div>
    @endif

    {{-- Goals Table --}}
    <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Due Date</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-200 divide-y divide-gray-700">
                @forelse($goals as $goal)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $goal->title }}</td>
                        <td class="px-4 py-3">{{ $goal->due_date ? $goal->due_date->format('Y-m-d') : '-' }}</td>
                        <td class="px-4 py-3">
                            @if ($goal->completed)
                                <span class="text-green-400 font-semibold">Completed</span>
                            @else
                                <span class="text-yellow-400 font-semibold">Pending</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('goals.edit', $goal) }}"
                                class="inline-block px-3 py-1 text-sm bg-yellow-600 hover:bg-yellow-700 text-white rounded">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('goals.destroy', $goal) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this goal?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-400">No goals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $goals->links() }}
    </div>
@endsection
