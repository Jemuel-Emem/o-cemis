<div class="p-6">
    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif


    <div class="mb-4 flex justify-end">
        <button wire:click="openModal" class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg shadow-md hover:bg-green-500 focus:ring-2 focus:ring-green-300">
            Add News/Updates
        </button>
    </div>


    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-gray-600 uppercase bg-green-100">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $event->title }}</td>
                        <td class="px-6 py-3">{{ $event->description }}</td>
                        <td class="px-6 py-3">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                        <td class="px-6 py-3">
                            <button wire:click="editEvent({{ $event->id }})" class="px-3 py-1 text-white bg-yellow-500 hover:bg-yellow-400 rounded-lg">
                                Edit
                            </button>
                            <button wire:click="deleteEvent({{ $event->id }})" class="px-3 py-1 text-white bg-red-500 hover:bg-red-400 rounded-lg">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-center text-gray-500">No events found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    @if ($showModal)
        <div class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg w-96">
                <div class="flex justify-between items-center p-4 bg-green-600 text-white rounded-t-lg">
                    <h3 class="text-lg font-bold">{{ $isEditing ? 'Edit News/Updates' : 'Add News/Updates' }}</h3>
                    <button wire:click="closeModal" class="text-white hover:text-gray-200">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="saveEvent">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Title</label>
                            <input wire:model="title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter event title">
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea wire:model="description" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter event description"></textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Date</label>
                            <input wire:model="date" type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>


                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg shadow-md hover:bg-green-500 focus:ring-2 focus:ring-green-300">
                                {{ $isEditing ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
