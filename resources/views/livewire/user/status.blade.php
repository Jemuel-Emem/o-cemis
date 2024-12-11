<div class="max-w-7xl mx-auto mt-10 p-6  rounded-lg shadow-md">


    @if ($profileExists)
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded-lg">
            You already have a profile. <a href="{{ route('user-profile') }}" class="text-green-600 hover:text-green-800">Click here to edit your profile.</a>
        </div>
    @else
        <div class="mb-4 px-4 py-2 bg-yellow-100 text-yellow-700 rounded-lg">
            You do not have a profile yet. Please <a href="{{ route('profile.create') }}" class="text-yellow-600 hover:text-yellow-800">create a profile</a>.
        </div>
    @endif
</div>
