<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@vite('resources/js/map.js')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="flex flex-col justify-around h-screen p-4 md:flex-row bg-gray-800 py-12">
        <div id="map" class="bg-gray-800 w-full md:w-1/2 h-full md:h-auto mb-4 md:mb-0">
        </div>

        <div class="flex flex-col space-y-4 w-2/3 md:w-1/2">
            <p class="text-black text-2xl font-bold">
                Incident reports
            </p>

            <div class="bg-white rounded-md p-4">
                <p class="text-black text-xl font-bold leading-tight">
                    Incident type:
                </p>
                <p class="text-black text-xl font-bold leading-tight">
                    Severity level:
                </p>
            </div>

            <div class="bg-white rounded-md p-4">
                <p class="text-black text-xl font-bold leading-tight">
                    Incident type:
                </p>
                <p class="text-black text-xl font-bold leading-tight">
                    Near points of interest:
                </p>
            </div>

            <!-- ... Other blocks ... -->

        </div>
    </div>
</x-app-layout>
