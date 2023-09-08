<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white border-2 border-white bg-indigo-500">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mb-4">POI Information</h2>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">ID</p>
                        <p class="font-semibold">{{ $pointOfInterest->id }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Title</p>
                        <p class="font-semibold">{{ $pointOfInterest->title }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Latitude</p>
                        <p class="font-semibold">{{ $pointOfInterest->latitude }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Longitude</p>
                        <p class="font-semibold">{{ $pointOfInterest->longitude }}</p>
                    </div>
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mt-6">Description</h2>
                        <p>{{ $pointOfInterest->description ?? 'N/A' }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Type</p>
                        <p class="font-semibold">{{ $pointOfInterest->type }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-black font-bold p-4">Narrative Level</p>
                        <p class="font-semibold">{{ $pointOfInterest->narrative_level }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
