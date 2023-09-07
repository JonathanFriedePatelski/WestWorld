<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Delos Incident Management</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @vite('resources/js/map.js')
</head>

<body class="bg-gray-900">
    <header>
        <nav class="bg-indigo-950 border-gray-200">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="" class="flex items-center">
                    <img src="" class="h-8 mr-3" alt="Delos Logo" />
                    <span class="self-center text-2xl text-white font-semibold whitespace-nowrap">Delos</span>
                </a>
                <div class="flex items-center">
                    <a href="#" class="text-sm  text-blue-600 hover:underline">Login</a>
                </div>
            </div>
        </nav>
        <nav class="bg-slate-950 mb-8">
            <div class="max-w-screen-xl px-4 py-3 mx-auto">
                <div class="flex items-center">
                    <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                        <li>
                            <a href="#" class="text-white hover:underline" aria-current="page">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="text-white hover:underline">Incidents</a>
                        </li>
                        <li>
                            <a href="#" class="text-white underline">Crews</a>
                        </li>
                        <li>
                            <a href="#" class="text-white hover:underline">Hovercraft</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="map" class="w-60vw h-60vh m-auto self-center"></div>
</body>

</html>
