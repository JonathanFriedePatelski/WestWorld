<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@vite('resources/js/map.js')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <button class="p-2 ml-6 bg-white text-black p-2 rounded" id="add-incident-btn">Add Incident</button>
    <div class="flex flex-col justify-around h-screen p-4 md:flex-row bg-gray-800 py-12">
        <div id="map" class="relative bg-gray-800 w-full md:w-1/2 h-full md:h-auto mb-4 md:mb-0 z-0"></div>

        <!-- Modal -->
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden" id="incident-modal">
            <div class="absolute top-1/4 left-1/4 w-1/2 h-1/2 bg-white p-4 rounded">
                <h2 class="text-xl font-bold mb-4">Add New Incident</h2>
                <input type="number" id="lat-input" placeholder="Latitude" class="mb-2 p-2 w-full rounded border">
                <input type="number" id="lng-input" placeholder="Longitude" class="mb-2 p-2 w-full rounded border">
                <select id="incident-type" class="mb-2 p-2 w-full rounded border">
                    <option value="Narrative ended">Narrative ended</option>
                    <option value="Malfunction">Malfunction</option>
                    <option value="Terrain destroyed">Terrain destroyed</option>
                    <option value="Decor destroyed">Decor destroyed</option>
                    <option value="Host Destroyed">Host Destroyed</option>
                </select>
                <select id="incident-severity" class="mb-2 p-2 w-full rounded border">
                    <option value="Critical">Critical</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
                <textarea id="description" placeholder="Incident details..." class="p-2 w-full rounded border"></textarea>
                <input type="datetime-local" id="occurred-at" class="mb-2 p-2 w-full rounded border">
                <button class="mt-4 bg-indigo-500 text-white p-2 rounded" id="save-incident-btn">Submit</button>
                <button class="mt-4 bg-red-500 text-white p-2 rounded" id="cancel-incident-btn">Cancel</button>
            </div>
        </div>

        <div class="flex flex-col space-y-4 w-2/3 md:w-1/2">
            <div class="flex flex-col space-y-4 w-2/3 md:w-1/2">
                <p class="text-black text-2xl font-bold">
                    Incident reports
                </p>

                @foreach(App\Models\Incident::orderByDesc('occurred_at')->with('pointOfInterest:id,title')->limit(3)->get() as $incident)
                <div class="bg-white rounded-md p-4">
                    <p class="text-black text-xl font-bold leading-tight">
                        Located near: {{ $incident->pointOfInterest->title }}
                    </p>
                    <p class="text-black text-xl font-bold leading-tight">
                        Incident type: {{ $incident->type }}
                    </p>
                    <p class="text-black text-xl font-bold leading-tight">
                        Severity level: {{ $incident->level }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <script>
            // Hide the modal when clicking outside of it
            document.addEventListener('click', function(event) {
                var modal = document.getElementById('incident-modal');
                if (!modal.contains(event.target) && event.target.id !== 'add-incident-btn' && event.target.id !== 'save-incident-btn') {
                    modal.classList.add('hidden');
                }
            });

            // Cancel button inside the modal
            document.getElementById('cancel-incident-btn').addEventListener('click', function() {
                document.getElementById('incident-modal').classList.add('hidden');
            });
        </script>

</x-app-layout>
