document.addEventListener('DOMContentLoaded', function() {
    const map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([51.5, -0.09]).addTo(map)
        .bindPopup('Un lugar interesante.')
        .openPopup();

    axios.get('https://api.example.com/geodata')
        .then(response => {
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
