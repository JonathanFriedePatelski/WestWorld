    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            @vite('resources/css/app.css')
            <title>Document</title>
            <link
                rel="stylesheet"
                href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
                crossorigin=""
            />
            <link rel="stylesheet" href="./resources/css/app.css">
            <!-- Make sure you put this AFTER Leaflet's CSS -->
            <script
                src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
                crossorigin=""
            ></script>
            <style>
                #map {
                    height: 50vh;
                    width: 70vw;
                }
                .leaflet-popup-content {
                    max-width: 200px;
                    max-height: 150px;
                    overflow-y: auto;
                }
            </style>
        </head>
        <body>
        <header>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <div class="flex items-center">
                <a href="tel:5541251234" class="mr-6 text-sm  text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>
                <a href="#" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</a>
            </div>
        </div>
    </nav>
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Company</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Team</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Features</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        </header>

       <div class="flex ">
            <div class="W-fit">sdasdasdsad</div>
            <div id="map" class=""></div>
        </div>
            <!-- script -->
            <script>
                // Create a Leaflet map with CRS.Simple
                var map = L.map("map", {
                    crs: L.CRS.Simple,
                    minZoom: -1,
                    maxZoom: 1,
                }).setView([1024, 1024], -1);

                // Define bounds for the image overlay
                var bounds = [
                    [0, 0],
                    [2048, 2048],
                ];

                // Add the image overlay
                var image = L.imageOverlay("./deep-dive-westworld-starter-kit/images/map.png", bounds).addTo(map);

                // Set max bounds to limit panning
                map.setMaxBounds(bounds);

                function getPOIMarkerOptions(poi) {
                    let color;
                    switch (poi.type) {
                        case "facility":
                            color = "blue";
                            break;
                        case "town":
                            color = "green";
                            break;
                        case "region":
                            color = "yellow";
                            break;
                        case "landmark":
                            color = "red";
                            break;
                        default:
                            color = "gray";
                    }

                    let shape;
                    switch (poi.narrative_level) {
                        case "peaceful":
                            shape = "circle";
                            break;
                        case "violent":
                            shape = "triangle";
                            break;
                        case "neutral":
                            shape = "square";
                            break;
                        default:
                            shape = "circle";
                    }

                    return { color, shape };
                }

                function createCustomIcon(color, shape) {
                    let svgString;

                    switch (shape) {
                        case "circle":
                            svgString = `<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="8" fill="${color}" stroke="black" stroke-width="1"/>
                    </svg>`;
                            break;
                        case "triangle":
                            svgString = `<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="12,4 4,20 20,20" fill="${color}" stroke="black" stroke-width="1"/>
                    </svg>`;
                            break;
                        case "square":
                            svgString = `<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="6" y="6" width="12" height="12" fill="${color}" stroke="black" stroke-width="1"/>
                    </svg>`;
                            break;
                        default:
                            svgString = `<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="8" fill="${color}" stroke="black" stroke-width="1"/>
                    </svg>`;
                            break;
                    }

                    return L.divIcon({
                        className: "custom-icon",
                        iconSize: [24, 24],
                        html: svgString,
                    });
                }

                function loadPOIs() {
                    fetch("data/points_of_interest.json")
                        .then((response) => response.json())
                        .then((data) => {
                            data.forEach((poi) => {
                                let lat = poi.latitude;
                                let lng = poi.longitude;
                                let { color, shape } = getPOIMarkerOptions(poi);

                                let customIcon = createCustomIcon(color, shape);
                                let marker = L.marker([lat, lng], {
                                    icon: customIcon,
                                }).addTo(map);

                                marker.bindPopup(
                                    `<b>Title:</b> ${poi.title}<br>
                    <b>Type:</b> ${poi.type}<br>
                    <b>Narrative Level:</b> ${poi.narrative_level}<br>
                    ${poi.description}`,
                                    {
                                        autoPan: true,
                                    }
                                );
                            });
                        })
                        .catch((error) =>
                            console.error(
                                "Error loading points_of_interest.json:",
                                error
                            )
                        );
                }

                function showBorder() {
                    fetch("objects/island.json")
                        .then((response) => response.json())
                        .then((data) => {
                            // Add the scaled and flipped coordinates as a polyline to the map
                            L.polyline(data.features[0].geometry.coordinates[0], {
                                color: "red",
                                weight: 2,
                            }).addTo(map);
                        })
                        .catch((error) =>
                            console.error("Error loading island.json:", error)
                        );
                }

                showBorder();

                loadPOIs();

                // Create a Leaflet control for the coordinate display
                var coordControl = L.control({ position: "topright" });

                coordControl.onAdd = function (map) {
                    this._div = L.DomUtil.create("div", "coordinate-display");
                    this._div.innerHTML = "Hover over the map";
                    // Make font white
                    this._div.style.color = "white";
                    return this._div;
                };

                // Update the coordinate display when the mouse moves
                map.on("mousemove", function (event) {
                    var lat = event.latlng.lat;
                    var lng = event.latlng.lng;
                    coordControl._div.innerHTML = `Lat: ${lat.toFixed(
                        2
                    )}, Lng: ${lng.toFixed(2)}`;
                });

                // Add the control to the map
                coordControl.addTo(map);
            </script>
        </body>
    </html>
