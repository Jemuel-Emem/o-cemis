<div class="max-w-7xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    {{-- <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Alumni Registration Form</h2> --}}

    @if (session()->has('message'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-3 gap-6">
            <!-- Full Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required />
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" id="phone" wire:model="number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required />
                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Graduation Year -->
            <div class="mb-4">
                <label for="graduation_year" class="block text-sm font-medium text-gray-700">Graduation Year</label>
                <select id="graduation_year" wire:model="graduation_year" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                    <option value="">Select Year</option>
                    @for ($year = date('Y'); $year >= 1980; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
                @error('graduation_year') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Program Completed -->
            <div class="mb-4">
                <label for="program" class="block text-sm font-medium text-gray-700">Program Completed</label>
                <input type="text" id="program" wire:model="program" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required />
                @error('program') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Current Occupation -->
            <div class="mb-4">
                <label for="occupation" class="block text-sm font-medium text-gray-700">Current Occupation</label>
                <input type="text" id="occupation" wire:model="occupation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('occupation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" wire:model="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required />
                @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- LinkedIn Profile -->
            <div class="mb-4">
                <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn Profile</label>
                <input type="url" id="linkedin" wire:model="linkedin" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('linkedin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Skills -->
            <div class="mb-4">
                <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                <input type="text" id="skills" wire:model="skills" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('skills') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Achievements -->
            <div class="mb-4">
                <label for="achievements" class="block text-sm font-medium text-gray-700">Achievements</label>
                <textarea id="achievements" wire:model="achievements" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"></textarea>
                @error('achievements') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md shadow hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Submit
            </button>
        </div>
    </form>

    @if($profile)
    <div class="mt-10">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Profile</h3>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <strong>Name:</strong> {{ $profile->name }}
            </div>
            <div>
                <strong>Phone:</strong> {{ $profile->number }}
            </div>
            <div>
                <strong>Graduation Year:</strong> {{ $profile->graduation_year }}
            </div>
            <div>
                <strong>Program Completed:</strong> {{ $profile->program }}
            </div>
            <div>
                <strong>Current Occupation:</strong> {{ $profile->occupation }}
            </div>
            <div>
                <strong>Address:</strong> {{ $profile->address }}
            </div>
            <div>
                <strong>LinkedIn Profile:</strong> <a  href="{{ $profile->linkedin }}" target="_blank">{{ $profile->linkedin }}</a>
            </div>
            <div>
                <strong>Skills:</strong> {{ $profile->skills }}
            </div>
            <div>
                <strong>Achievements:</strong> {{ $profile->achievements }}
            </div>
        </div>
    </div>
@else
    <div class="mt-6 text-gray-600">
        No profile data available. Please fill out the form above.
    </div>
@endif
</div>
