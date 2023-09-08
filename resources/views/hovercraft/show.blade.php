<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white border-2 border-white bg-indigo-500">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mb-4">Hovercraft Information</h2>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">ID</p>
                        <p class="font-semibold">{{ $hovercraft->id }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Crew ID</p>
                        <p class="font-semibold">{{ $hovercraft->crew_id }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Fuel Level</p>
                        <p class="font-semibold">{{ $hovercraft->fuel_level }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Wear Level</p>
                        <p class="font-semibold">{{ $hovercraft->wear_level }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Age</p>
                        <p class="font-semibold">{{ $hovercraft->age }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
