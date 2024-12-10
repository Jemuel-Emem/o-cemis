<div class="p-6">
<span class="text-white text-4xl font-bold">News and Updates</span>
    @if($events->isEmpty())
        <p class="text-center text-gray-600">No upcoming events.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            @foreach($events as $event)
                <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-lg overflow-hidden">

                    <img class="w-full h-48 object-cover" src="{{ asset('images/logona.jpg') }}">

                    <div class="p-4">

                        <h3 class="text-xl font-semibold text-gray-800">{{ $event->title }}</h3>


                        <p class="text-sm text-gray-500 mt-1">{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>



                        <p class="text-gray-700 mt-2">{{ Str::limit($event->description, 100) }}</p>


                        {{-- <div class="mt-4">
                            <a href="" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">
                                View Details
                            </a>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
