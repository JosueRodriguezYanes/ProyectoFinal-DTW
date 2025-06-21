document.addEventListener('DOMContentLoaded', function() {
    // Inicializa el mapa
    const map = L.map('map').setView([51.505, -0.09], 13);

    // Añade capa de tiles (puedes usar OpenStreetMap, Mapbox, etc.)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Añade un marcador
    L.marker([51.5, -0.09]).addTo(map)
        .bindPopup('Un lugar interesante.')
        .openPopup();

    // Opcional: consumir una API de geolocalización
    axios.get('https://api.example.com/geodata')
        .then(response => {
            // Procesar datos y añadir al mapa
            response.data.forEach(location => {
                L.marker([location.lat, location.lng])
                    .addTo(map)
                    .bindPopup(location.name);
            });
        })
        .catch(error => {
            console.error('Error cargando datos geográficos:', error);
        });
});