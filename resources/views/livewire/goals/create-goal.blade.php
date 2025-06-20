<div>
    {{-- Create Goal Button --}}
    <button wire:click="$set('showModal', true)"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mb-4">
        + Create Goal
    </button>

    {{-- Modal --}}
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-gray-800 rounded-lg shadow-xl w-full max-w-md p-6 relative"
                    wire:click.away="$set('showModal', false)">
                    {{-- Close --}}
                    <button wire:click="$set('showModal', false)"
                        class="absolute top-3 right-3 text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>

                    <h2 class="text-xl text-white font-semibold mb-4">Create New Goal</h2>

                    <form wire:submit.prevent="createGoal" class="space-y-4">
                        <div>
                            <label class="block text-white">Title</label>
                            <input type="text" wire:model.defer="title"
                                class="w-full mt-1 px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500">
                            @error('title')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-white">Due Date</label>
                            <input type="date" wire:model.defer="due_date"
                                class="w-full mt-1 px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500">
                            @error('due_date')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-white">Status</label>
                            <select wire:model.defer="status"
                                class="w-full mt-1 px-3 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500">
                                <option value="not started">Not Started</option>
                                <option value="in progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                            @error('status')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                Save Goal
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Overlay --}}
            <div class="fixed inset-0 bg-black opacity-50 z-40" wire:click="$set('showModal', false)"></div>
        </div>
    @endif

</div>
