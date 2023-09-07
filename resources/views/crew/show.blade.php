<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-indigo-300">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mb-4">Crew Information</h2>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">ID</p>
                        <p class="font-semibold">{{ $crew->id }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Latitude</p>
                        <p class="font-semibold">{{ $crew->call_sign }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
