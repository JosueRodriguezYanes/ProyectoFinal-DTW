document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('datos-api');
    const map = L.map('map').setView([0, 0], 2);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    axios.get('https://api.publicapis.org/entries')
        .then(response => {
            const entries = response.data.entries.slice(0, 5);
            
            // Mostrar en lista
            let html = '<ul class="list-group mt-3">';
            entries.forEach(e => {
                html += `<li class="list-group-item"><strong>${e.API}</strong> - ${e.Description}</li>`;
                
                // Añadir marcador aleatorio para cada entrada (ejemplo)
                const lat = Math.random() * 180 - 90;
                const lng = Math.random() * 360 - 180;
                L.marker([lat, lng]).addTo(map)
                    .bindPopup(`<b>${e.API}</b><br>${e.Description}`);
            });
            html += '</ul>';
            container.innerHTML = html;
        })
        .catch(error => {
            container.innerHTML = '<p>Error cargando datos externos.</p>';
            console.error(error);
        });
});