<div class="p-6">
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
        <div class="p-4 bg-cyan-700 text-white font-bold text-lg">Alumni Profiles</div>


        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-gray-600 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">Full Name</th>
                    <th scope="col" class="px-6 py-3">Graduation Year</th>
                    <th scope="col" class="px-6 py-3">Program Completed</th>
                    <th scope="col" class="px-6 py-3">Current Occupation</th>
                    <th scope="col" class="px-6 py-3">LinkedIn Profile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumniProfiles as $profile)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $profile->name }}</td>
                        <td class="px-6 py-4">{{ $profile->graduation_year }}</td>
                        <td class="px-6 py-4">{{ $profile->program }}</td>
                        <td class="px-6 py-4">{{ $profile->occupation }}</td>
                        <td class="px-6 py-4">
                            @if ($profile->linkedin)
                                <a href="{{ $profile->linkedin }}" class="text-cyan-700" target="_blank">View LinkedIn</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
