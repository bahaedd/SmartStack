@extends('layouts.app')

@section('content')
    {{-- Split layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-12">
        {{-- Habits Table --}}
        <div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">Habit Tracker</h1>
                    <button data-modal-target="create-habit-modal" data-modal-toggle="create-habit-modal"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mb-4" title="New">
                        <i class="fa-solid fa-square-plus"></i>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-gray-700 text-gray-300">
                        <tr>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Frequency</th>
                            <th class="px-4 py-3">Start</th>
                            <th class="px-4 py-3">Progress</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-200 divide-y divide-gray-700 text-sm font-semibold">
                        @forelse($habits as $habit)
                            <tr>
                                <td class="px-4 py-3">{{ $habit->title }}</td>
                                <td class="px-4 py-3 capitalize">{{ $habit->frequency }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($habit->start_date)->format('Y-m-d') }}</td>
                                <td class="px-4 py-3">
                                    {{ $habit->completed_days }} / {{ $habit->goal_days ?? '∞' }}
                                </td>
                                <td class="px-4 py-3 text-right space-x-2">
                                    <a href="{{ route('habits.show', $habit) }}"
                                        class="inline-block text-sm text-white rounded" title="View">
                                        <i class="fa-solid fa-eye text-cyan-400"></i>
                                    </a>
                                    <a href="{{ route('habits.edit', $habit) }}"
                                        class="inline-block text-sm text-white rounded" title="Edit">
                                        <i class="fas fa-edit text-violet-400"></i>
                                    </a>
                                    <form action="{{ route('habits.destroy', $habit) }}" method="POST" class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this habit?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-white rounded" title="Delete">
                                            <i class="fas fa-trash-alt text-red-500"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-400">No habits found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $habits->links() }}
            </div>
        </div>

        {{-- Charts --}}
        <div>
            <div id="habit-progress-chart" class="bg-gray-800 rounded-lg p-4 shadow h-80"></div>
            <div id="habit-donut-chart" class="bg-gray-800 rounded-lg p-4 shadow mt-4 h-80"></div>
        </div>
    </div>

    {{-- Modal --}}
    <div id="create-habit-modal"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-gray-800 rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="create-habit-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <form action="{{ route('habits.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <h3 class="text-xl font-medium text-white">New Habit</h3>

                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-white">Title</label>
                        <input type="text" name="title" id="title" required
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="frequency" class="block mb-2 text-sm font-medium text-white">Frequency</label>
                        <select name="frequency" id="frequency" required
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                        </select>
                    </div>

                    <div>
                        <label for="start_date" class="block mb-2 text-sm font-medium text-white">Start Date</label>
                        <input type="date" name="start_date" id="start_date" required
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="goal_days" class="block mb-2 text-sm font-medium text-white">Goal Days</label>
                        <input type="number" name="goal_days" id="goal_days" min="1"
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="notes" class="block mb-2 text-sm font-medium text-white">Notes</label>
                        <textarea id="notes" name="notes" rows="4"
                            class="block p-2.5 w-full text-sm text-white bg-gray-700 rounded-lg border border-gray-600 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="..."></textarea>
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
            const progressChart = new ApexCharts(document.querySelector("#habit-progress-chart"), {
                chart: {
                    type: 'bar',
                    height: 320,
                    background: 'transparent',
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Progress',
                    data: @json($habits->map(fn($h) => $h->completed_days))
                }],
                xaxis: {
                    categories: @json($habits->pluck('title')),
                    labels: {
                        style: {
                            colors: '#d1d5db'
                        }
                    }
                },
                colors: ['#10B981'],
                tooltip: {
                    theme: 'dark'
                },
                dataLabels: {
                    enabled: false
                },
                grid: {
                    borderColor: '#334155'
                }
            });

            progressChart.render();

            const donutChart = new ApexCharts(document.querySelector("#habit-donut-chart"), {
                chart: {
                    type: 'donut',
                    height: 320,
                    background: 'transparent',
                },
                series: [
                    {{ $habits->where('completed_days', '>=', fn($h) => $h->goal_days ?? 0)->count() }},
                    {{ $habits->where('completed_days', '<', fn($h) => $h->goal_days ?? 9999)->count() }}
                ],
                labels: ['Completed', 'In Progress'],
                colors: ['#10B981', '#FBBF24'],
                legend: {
                    labels: {
                        colors: '#d1d5db'
                    }
                }
            });

            donutChart.render();
        });
    </script>
@endsection
