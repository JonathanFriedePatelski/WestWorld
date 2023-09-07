<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-indigo-300">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mb-4">Incident Information</h2>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">ID</p>
                        <p class="font-semibold">{{ $incident->id }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Latitude</p>
                        <p class="font-semibold">{{ $incident->latitude }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Longitude</p>
                        <p class="font-semibold">{{ $incident->longitude }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Type</p>
                        <p class="font-semibold">{{ $incident->type }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-gray-500">Severity</p>
                        <p class="font-semibold">{{ $incident->severity }}</p>
                    </div>
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mt-6">Description</h2>
                        <p>{{ $incident->description ?? 'N/A' }}</p>
                    </div>
                    <div class="col-span-2">
                        <h2 class="text-2xl font-semibold mt-6">Occurred At</h2>
                        <p>{{ $incident->occurred_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
