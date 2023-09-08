    // Create a Leaflet map with CRS.Simple
const map = L.map("map", {
    crs: L.CRS.Simple,
    minZoom: -1,
    maxZoom: 1,
}).setView([1024, 1024], -1);

// Define bounds for the image overlay
const bounds = [
    [0, 0],
    [2048, 2048],
];

// Add the image overlay
const image = L.imageOverlay("/assets/img/map.png", bounds).addTo(map);

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

    return {
        color,
        shape,
    };
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

let pois = []; // This will hold all your POIs

function loadPOIs() {
    fetch("/api/pointsofinterest")
        .then((response) => response.json())
        .then((data) => {
            pois = data; // Store the loaded POIs in the global variable
            data.forEach((poi) => {
                const lat = poi.latitude;
                const lng = poi.longitude;
                const { color, shape } = getPOIMarkerOptions(poi);

                const customIcon = createCustomIcon(color, shape);
                const marker = L.marker([lat, lng], {
                    icon: customIcon,
                }).addTo(map);

                marker.bindPopup(
                    `<b>Title: </b><a href="/pointsofinterest/${poi.id}"> ${poi.title}</a><br>
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
            console.error("Error loading points_of_interest.json:", error)
        );
}

loadPOIs();

// Create a Leaflet control for the coordinate display
const coordControl = L.control({
    position: "topright",
});

coordControl.onAdd = function(map) {
    this._div = L.DomUtil.create("div", "coordinate-display");
    this._div.innerHTML = "Hover over the map";
    // Make font white
    this._div.style.color = "white";
    return this._div;
};

// Update the coordinate display when the mouse moves
map.on("mousemove", (event) => {
    const { lat } = event.latlng;
    const { lng } = event.latlng;
    coordControl._div.innerHTML = `Lat: ${lat.toFixed(2)}, Lng: ${lng.toFixed(
        2
    )}`;
});

// Add the control to the map
coordControl.addTo(map);

function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2 - lat1);
    var dLon = deg2rad(lon2 - lon1);
    var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2)
        ;
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c; // Distance in km
    return d;
}

function deg2rad(deg) {
    return deg * (Math.PI / 180)
}

function findNearestPOI(lat, lng) {
    let nearestPOI = null;
    let shortestDistance = Infinity;

    pois.forEach(poi => {
        const distance = getDistanceFromLatLonInKm(lat, lng, poi.latitude, poi.longitude);
        if (distance < shortestDistance) {
            shortestDistance = distance;
            nearestPOI = poi;
        }
    });

    return nearestPOI;
}

let currentMarker = null;

document.getElementById('add-incident-btn').addEventListener('click', () => {
    addingIncident = true;
});

map.on('click', function (e) {
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;

    // If a marker already exists, remove it
    if (currentMarker) {
        map.removeLayer(currentMarker);
    }

    // Create a new marker and store it in the currentMarker variable
    currentMarker = L.marker([lat, lng]).addTo(map);

    // Populate the input fields with the clicked coordinates
    document.getElementById('lat-input').value = lat;
    document.getElementById('lng-input').value = lng;

    // Show the modal
    document.getElementById('incident-modal').classList.remove('hidden');
});

document.getElementById('lat-input').addEventListener('input', function () {
    if (currentMarker) {
        const newLat = parseFloat(this.value);
        const currentLng = currentMarker.getLatLng().lng;
        currentMarker.setLatLng([newLat, currentLng]);
    }
});

// Update marker position when longitude input changes
document.getElementById('lng-input').addEventListener('input', function () {
    if (currentMarker) {
        const currentLat = currentMarker.getLatLng().lat;
        const newLng = parseFloat(this.value);
        currentMarker.setLatLng([currentLat, newLng]);
    }
});

document.getElementById('save-incident-btn').addEventListener('click', () => {
    const lat = parseFloat(document.getElementById('lat-input').value);
    const lng = parseFloat(document.getElementById('lng-input').value);
    const type = document.getElementById('incident-type').value;
    const severity = document.getElementById('incident-severity').value;
    const description = document.getElementById('description').value;
    const occurredAt = document.getElementById('occurred-at').value;
    const nearestPOI = findNearestPOI(lat, lng); // Find the nearest POI

    // Use AJAX to send the data to your Laravel backend
    axios.post('/api/incidents/store', {
        latitude: lat,
        longitude: lng,
        type: type,
        severity: severity,
        description: description,
        occurred_at: occurredAt,
        point_of_interest_id: nearestPOI.id // Send the nearest POI's ID
    })
        .then(response => {
            console.log("Closest POI:", nearestPOI);
            console.log('Incident saved:', response);
            document.getElementById('incident-modal').classList.add('hidden');
            if (currentMarker) {
                map.removeLayer(currentMarker);
            }
        })
        .catch(error => {
            console.error('Error saving incident:', error);
        });
});

// Hide the modal when clicking outside of it
document.addEventListener('click', function (event) {
    var modal = document.getElementById('incident-modal');
    if (!modal.contains(event.target) && event.target.id !== 'add-incident-btn' && event.target.id !== 'save-incident-btn') {
        modal.classList.add('hidden');
    }
});

// Cancel button inside the modal
document.getElementById('cancel-incident-btn').addEventListener('click', function () {
    document.getElementById('incident-modal').classList.add('hidden');
    if (currentMarker) {
        map.removeLayer(currentMarker);
    }
});

const imageOverlay = L.imageOverlay("/assets/img/map.png", bounds).addTo(map);
map.setMaxBounds(bounds);

let incidents = []; // This will hold all your incidents
let incidentMarkers = [];
let incidentsVisible = true;

function createIncidentMarkers(incidents) {
    incidents.forEach((incident) => {
        const lat = parseFloat(incident.latitude);
        const lng = parseFloat(incident.longitude);

        const marker = L.circleMarker([lat, lng], {
            radius: 1,
            color: "red",
        }).addTo(map);

        marker.bindPopup(
            `<b>Type:</b> ${incident.type}<br>
             <b>Severity:</b> ${incident.severity}<br>
             <b>Description:</b> ${incident.description || 'N/A'}<br>
             <a href="/incidents/${incident.id}">More Info</a>`,
            {
                autoPan: true,
            }
        );

        incidentMarkers.push(marker);
    });
}

const controlPanel = L.control({
    position: 'topright'
});

controlPanel.onAdd = function () {
    this._div = L.DomUtil.create('div', 'control-panel');

    this._div.innerHTML = `
        <label class="text-white" for="poi-filter">POI:</label>
        <select id="poi-filter">
            <option value="all">All</option>
        </select>

        <label class="text-white" for="severity-filter">Severity:</label>
        <select id="severity-filter">
            <option value="all">All</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>

        <button class="bg-white p-4 text-extrabold text-xl" id="toggle-incidents">Toggle Incidents</button>
    `;

    return this._div;
};

controlPanel.addTo(map);

document.getElementById("poi-filter").addEventListener("change", function () {
    filterIncidents();
});

document.getElementById("severity-filter").addEventListener("change", function () {
    filterIncidents();
});

document.getElementById("toggle-incidents").addEventListener("click", function () {
    if (incidentsVisible) {
        incidentMarkers.forEach(marker => {
            map.removeLayer(marker);
        });
    } else {
        incidentMarkers.forEach(marker => {
            marker.addTo(map);
        });
    }

    incidentsVisible = !incidentsVisible;
});

function populateDropdowns(incidents) {
    const poiSet = new Set();

    incidents.forEach(incident => {
        poiSet.add(incident.point_of_interest_id); // Assuming incident has this field
    });

    const poiFilterElem = document.getElementById("poi-filter");

    // Sorting POIs based on their ID in ascending order
    Array.from(poiSet).sort((a, b) => a - b).forEach(poi => {
        const optionElem = document.createElement("option");
        optionElem.value = poi;
        optionElem.textContent = poi; // Note: You might want to show the POI name here instead of ID
        poiFilterElem.appendChild(optionElem);
    });
}

function filterIncidents() {
    const poiFilterValue = document.getElementById("poi-filter").value;
    const severityFilterValue = document.getElementById("severity-filter").value;

    if (poiFilterValue === "all" && severityFilterValue === "all") {
        // Show all incidents
        incidentMarkers.forEach(marker => {
            marker.addTo(map);
        });
        return;
    }

    // Clear existing markers
    incidentMarkers.forEach(marker => {
        map.removeLayer(marker);
    });
    incidentMarkers = [];

    // Filter the incidents based on the selected criteria
    const filteredIncidents = incidents.filter(incident => {
        return (incident.point_of_interest_id == poiFilterValue) &&
               (incident.severity === severityFilterValue);
    });

    createIncidentMarkers(filteredIncidents);
}

function loadIncidents() {
    fetch("/api/incidents")
        .then((response) => response.json())
        .then((data) => {
            incidents = data; // Store the loaded incidents in the global variable
            incidentMarkers.forEach(marker => {
                map.removeLayer(marker);
            });
            incidentMarkers = [];
            createIncidentMarkers(data);
            populateDropdowns(data); // Populate the dropdowns based on the loaded incidents
        })
        .catch((error) => console.error("Error loading incidents:", error));
}

loadIncidents();
