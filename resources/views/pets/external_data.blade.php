@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Datos de API Externa</h1>

    <button id="fetchData" class="btn btn-primary mb-3">Obtener Datos</button>

    <div id="apiResults" class="row"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.getElementById('fetchData').addEventListener('click', function() {
    axios.get('https://api.thecatapi.com/v1/breeds')
        .then(response => {
            const resultsDiv = document.getElementById('apiResults');
            resultsDiv.innerHTML = '';


            const limitedData = response.data.slice(0, 5);

            limitedData.forEach(breed => {
                const card = `
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${breed.name}</h5>
                                <p class="card-text">${breed.description || 'No description available'}</p>
                                <p class="card-text"><small class="text-muted">Origen: ${breed.origin}</small></p>
                            </div>
                        </div>
                    </div>
                `;
                resultsDiv.innerHTML += card;
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            alert('Error al obtener datos de la API');
        });
});
</script>
@endsection
