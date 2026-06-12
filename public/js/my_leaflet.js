
let activePage = document.querySelector('div[pageName]');
let routeData = JSON.parse(activePage.getAttribute('data-json'));
console.log(routeData);

if (typeof routeData === 'undefined') {
    console.error("La variable 'routeData' n'est pas définie.");
} else {

    const map = L.map('map').setView([47.7511, -3.3661], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap',
        maxZoom: 19
    }).addTo(map);

    try {
        const route = routeData.route;

        if (!route || !route.coordinates) {
            throw new Error("Structure JSON invalide : 'route' ou 'coordinates' manquant.");
        }

        const titleEl = document.getElementById('route-title');
        if (titleEl && route.name) {
            titleEl.textContent = route.name;
        }

        const latLngs = route.coordinates.map(coord => [coord.lat, coord.lon]);

        if (latLngs.length === 0) {
            throw new Error("Aucune coordonnée dans le trajet.");
        }

        const polyline = L.polyline(latLngs, {
            color: '#2E86AB',
            weight: 5,
            opacity: 0.8,
            lineCap: 'round'
        }).addTo(map);

        const greenIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        const redIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        const blueIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        latLngs.forEach((point, index) => {

            let markerType = 'intermédiaire';
            let popupContent = `Point ${index + 1}`;
            let iconColor = '#666666';

            if (index === 0) {
                markerType = 'Départ';
                popupContent = '<b>Départ</b><br>' + route.name;
                iconColor = '#28a745';
            } else if (index === latLngs.length - 1) {
                markerType = 'Arrivée';
                popupContent = '<b>Arrivée</b><br>' + route.name;
                iconColor = '#dc3545';
            }

            const marker = L.marker(point).addTo(map);

            marker.bindPopup(`
                <div style="text-align:center;">
                    <strong>${markerType}</strong><br>
                    <small>Point ${index + 1}/${latLngs.length}</small><br>
                    <small>Lat: ${point[0].toFixed(4)}, Lon: ${point[1].toFixed(4)}</small>
                </div>
            `);

            if (index === 0) {
                marker.openPopup();
            }
        }

        );
        map.fitBounds(polyline.getBounds(), { padding: [50, 50] });

    } catch (e) {
        console.error("Erreur de traitement des données:", e);
        const titleEl = document.getElementById('route-title');
        if (titleEl) titleEl.textContent = 'Erreur de données';

        const mapDiv = document.getElementById('map');
        mapDiv.innerHTML += `<div style="background:white; padding:10px; border:1px solid red;">
            <strong>Erreur:</strong> ${e.message}
        </div>`;
    }
}
