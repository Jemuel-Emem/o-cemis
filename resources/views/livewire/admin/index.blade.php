<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- New Register -->
        <div class="flex items-center p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
            <div class="flex items-center justify-center w-16 h-16 bg-cyan-700 text-white text-2xl rounded-full">
                <i class="ri-heart-2-line"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-bold text-gray-700">New Register</h2>
                <p class="text-3xl font-bold text-cyan-700">{{ $newRegisterCount }}</p>
            </div>
        </div>

        <!-- News and Update -->
        <div class="flex items-center p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
            <div class="flex items-center justify-center w-16 h-16 bg-orange-500 text-white text-2xl rounded-full">
                <i class="ri-water-flash-line"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-bold text-gray-700">News and Update</h2>
                <p class="text-3xl font-bold text-orange-500">{{ $newsUpdateCount }}</p>
            </div>
        </div>

        <!-- Alumni -->
        <div class="flex items-center p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
            <div class="flex items-center justify-center w-16 h-16 bg-cyan-500 text-white text-2xl rounded-full">
                <i class="ri-group-line"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-bold text-gray-700">Alumni</h2>
                <p class="text-3xl font-bold text-cyan-500">{{ $alumniCount }}</p>
            </div>
        </div>
    </div>
</div>
