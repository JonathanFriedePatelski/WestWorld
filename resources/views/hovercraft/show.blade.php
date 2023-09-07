<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-indigo-300">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mb-4">Hovercraft Information</h2>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">ID</p>
                        <p class="font-semibold">{{ $hovercraft->id }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Crew ID</p>
                        <p class="font-semibold">{{ $hovercraft->crew_id }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Fuel Level</p>
                        <p class="font-semibold">{{ $hovercraft->fuel_level }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Wear Level</p>
                        <p class="font-semibold">{{ $hovercraft->wear_level }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Age</p>
                        <p class="font-semibold">{{ $hovercraft->age }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
