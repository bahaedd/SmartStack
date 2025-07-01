@extends('layouts.app')

@section('content')
    {{-- Split layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-12">
        {{-- Goals Table --}}
        <div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">Goal Tracker</h1>
                    <button data-modal-target="create-goal-modal" data-modal-toggle="create-goal-modal"
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
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Due Date</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-200 divide-y divide-gray-700 text-sm font-semibold">
                        @forelse($goals as $goal)
                            <tr>
                                <td class="px-4 py-3">{{ $goal->title }}</td>
                                <td class="px-4 py-3">{{ $goal->description }}</td>
                                <td class="px-4 py-3">{{ $goal->due_date ? $goal->due_date->format('Y-m-d') : '-' }}</td>
                                <td class="px-3 py-2">
                                    @if ($goal->completed)
                                        <span class="text-green-400 font-semibold">
                                            <i class="fa-solid fa-check-to-slot" title="Completed"></i></span>
                                    @else
                                        <span class="text-yellow-400 font-semibold"><i class="fa-solid fa-spinner"
                                                title="Pending"></i></span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right space-x-2">
                                    <a href="{{ route('goals.milestones.index', $goal) }}"
                                        class="inline-block text-sm text-white rounded" title="Milestones">
                                        <i class="fa-solid fa-list-check text-yellow-400"></i>
                                    </a>
                                    <a href="{{ route('goals.edit', $goal) }}"
                                        class="inline-block text-sm text-white rounded" title="Edit">
                                        <i class="fas fa-edit text-violet-400"></i>
                                    </a>
                                    <form action="{{ route('goals.destroy', $goal) }}" method="POST" class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this goal?');">
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
                                <td colspan="4" class="px-4 py-4 text-center text-gray-400">No goals found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $goals->links() }}
            </div>
        </div>

        {{-- Column Chart --}}
        <div class="">
            <div id="goals-chart" class="bg-gray-800 rounded-lg p-4 shadow h-80"></div>
            <div id="donut-chart" class="w-full h-80 bg-gray-800 rounded-lg p-4 shadow mt-3"></div>
            <div id="monthly-goals-line-chart" class="h-96 bg-gray-800 rounded-lg p-4 shadow mt-3"></div>
        </div>

    </div>

    {{-- Modal --}}
    <div id="create-goal-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-gray-800 rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="create-goal-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <form action="{{ route('goals.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <h3 class="text-xl font-medium text-white">New Goal</h3>

                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-white">Title</label>
                        <input type="text" name="title" id="title" required
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="due_date" class="block mb-2 text-sm font-medium text-white">Due Date</label>
                        <input type="date" name="due_date" id="due_date" required
                            class="w-full px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>

                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
            const options = {
                chart: {
                    type: 'bar',
                    height: 320,
                    stacked: false,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                series: [{
                        name: 'Completed',
                        data: @json($completedData)
                    },
                    {
                        name: 'Pending',
                        data: @json($pendingData)
                    }
                ],
                colors: ['#10B981', '#FBBF24'],
                xaxis: {
                    type: 'category',
                    title: {
                        text: 'Month'
                    },
                    labels: {
                        style: {
                            colors: '#d1d5db'
                        },
                        rotate: -45
                    }
                },
                yaxis: {
                    title: {
                        text: 'Goals'
                    },
                    labels: {
                        style: {
                            colors: '#d1d5db'
                        }
                    }
                },
                tooltip: {
                    theme: 'dark'
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'top',
                    labels: {
                        colors: '#d1d5db'
                    }
                },
                grid: {
                    borderColor: '#334155'
                }
            };

            const chart = new ApexCharts(document.querySelector("#goals-chart"), options);
            chart.render();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chartOptions = {
                chart: {
                    type: 'line',
                    height: 380,
                    toolbar: {
                        show: false
                    },
                    background: 'transparent'
                },
                series: [{
                    name: 'Completed',
                    data: @json($completedData)
                }, {
                    name: 'Pending',
                    data: @json($pendingData)
                }],
                xaxis: {
                    type: 'category',
                    labels: {
                        style: {
                            colors: '#d1d5db'
                        }
                    },
                    title: {
                        text: 'Month',
                        style: {
                            color: '#d1d5db'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#d1d5db'
                        }
                    },
                    title: {
                        text: 'Goals',
                        style: {
                            color: '#d1d5db'
                        }
                    }
                },
                colors: ['#10B981', '#FBBF24'],
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                legend: {
                    labels: {
                        colors: '#d1d5db'
                    }
                },
                tooltip: {
                    theme: 'dark'
                }
            };

            const chart = new ApexCharts(document.querySelector("#monthly-goals-line-chart"), chartOptions);
            chart.render();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const options = {
                chart: {
                    type: 'donut',
                    height: 320,
                },
                series: [
                    {{ $goals->where('completed', true)->count() }},
                    {{ $goals->where('completed', false)->count() }}
                ],
                labels: ['Completed', 'Pending'],
                colors: ['#10B981', '#FBBF24'],
                legend: {
                    labels: {
                        colors: '#d1d5db'
                    }
                },
                dataLabels: {
                    style: {
                        colors: ['#fff']
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#donut-chart"), options);
            chart.render();
        });
    </script>
@endsection
