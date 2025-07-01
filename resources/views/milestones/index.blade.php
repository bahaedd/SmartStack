@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-12">
        {{-- Milestones Table --}}
        <div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold">Milestones for: {{ $goal->title }}</h1>
                    <button data-modal-target="create-milestone-modal" data-modal-toggle="create-milestone-modal"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
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
                        @forelse($milestones as $milestone)
                            <tr>
                                <td class="px-4 py-3 font-medium">{{ $milestone->title }}</td>
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($milestone->due_date)->format('Y-m-d') }}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($milestone->completed)
                                        <span class="text-green-400 font-semibold">
                                            <i class="fa-solid fa-check-to-slot" title="Completed"></i></span>
                                    @else
                                        <span class="text-yellow-400 font-semibold"><i class="fa-solid fa-spinner"
                                                title="Pending"></i></span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right space-x-2">
                                    <a href="{{ route('milestones.edit', $milestone) }}"
                                        class="text-green-500 hover:text-green-400">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('milestones.destroy', $milestone) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Delete this milestone?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center text-gray-400">
                                    No milestones yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Chart Area --}}
        <div class="bg-gray-800 rounded-lg p-4 shadow">
            <h2 class="text-xl font-bold text-white mb-4">Milestone Progress</h2>
            <div id="milestones-chart" class="h-80"></div>
        </div>
    </div>

    {{-- Create Milestone Modal --}}
    <div id="create-milestone-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-gray-800 rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 hover:text-white bg-transparent rounded-lg text-sm p-1.5"
                    data-modal-hide="create-milestone-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <form action="{{ route('goals.milestones.store', $goal->id) }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <h3 class="text-xl font-medium text-white">Create Milestone</h3>

                    <div>
                        <label for="title" class="block text-sm font-medium text-white mb-1">Title</label>
                        <input type="text" name="title" id="title" required
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="due_date" class="block text-sm font-medium text-white mb-1">Due Date</label>
                        <input type="date" name="due_date" id="due_date" required
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-200">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full mt-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white focus:outline-none"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg"
                            title="Save">
                            <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const options = {
                chart: {
                    type: 'donut',
                    height: 320
                },
                series: [
                    {{ $milestones->where('completed', true)->count() }},
                    {{ $milestones->where('completed', false)->count() }}
                ],
                labels: ['Completed', 'Pending'],
                colors: ['#10B981', '#FBBF24'],
                legend: {
                    labels: {
                        colors: '#d1d5db'
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#milestones-chart"), options);
            chart.render();
        });
    </script>
@endsection
