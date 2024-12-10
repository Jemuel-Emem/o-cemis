<div class="p-6">

    @if (session()->has('message'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif


    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-gray-600 uppercase bg-green-100">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $user->name }}</td>
                        <td class="px-6 py-3">{{ $user->email }}</td>



                        <td class="px-6 py-3">
                            @if ( $user->is_approved == 0)
                                <span class="bg-orange-400 p-1 rounded text-white ">Not Approved</span>
                             @else
                             <span class="bg-green-400 p-1 rounded text-white ">Approved</span>
                            @endif
                            </td>
                            <td class="px-6 py-3">

                                @if ($user->is_approved == 0)
                                    <button wire:click="approve({{ $user->id }})"
                                            class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg shadow-md hover:bg-green-500 focus:ring-2 focus:ring-green-300">
                                        Approve
                                    </button>

                                    <button wire:click="decline({{ $user->id }})"
                                            class="ml-2 px-4 py-2 bg-red-600 text-white font-medium rounded-lg shadow-md hover:bg-red-500 focus:ring-2 focus:ring-red-300">
                                        Decline
                                    </button>
                                @else

                                    <span class="text-gray-500 font-medium">Done</span>
                                @endif

                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
