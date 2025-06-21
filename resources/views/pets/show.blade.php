@extends('backend.index')
@section('content')
<div class="container mt-4">
  <h1>Detalles de Mascota</h1>
  <ul class="list-group">
    <li class="list-group-item"><strong>Nombre:</strong> {{ $pet->name }}</li>
    <li class="list-group-item"><strong>Especie:</strong> {{ $pet->species }}</li>
    <li class="list-group-item"><strong>Raza:</strong> {{ $pet->breed }}</li>
    <li class="list-group-item"><strong>Edad:</strong> {{ $pet->age }}</li>
    <li class="list-group-item"><strong>Dueño:</strong> {{ $pet->owner_name }}</li>
    <li class="list-group-item"><strong>Vacunado:</strong> {{ $pet->vaccinated ? 'Sí' : 'No' }}</li>
  </ul>
  <a href="{{ route('pets.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
