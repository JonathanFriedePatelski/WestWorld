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

function loadPOIs() {
    fetch("/api/pointsofinterest")
        .then((response) => response.json())
        .then((data) => {
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
