@extends('backend.index')
@section('content')
<div class="container mt-4">
  <h1>Editar Mascota</h1>
  <form action="{{ route('pets.update', $pet) }}" method="POST" id="petForm">
    @csrf @method('PUT')
    <div class="mb-3"><label>Nombre *</label>
      <input type="text" name="name" class="form-control" value="{{ $pet->name }}" required></div>
    <div class="mb-3"><label>Especie *</label>
      <input type="text" name="species" class="form-control" value="{{ $pet->species }}" required></div>
    <div class="mb-3"><label>Raza</label>
      <input type="text" name="breed" class="form-control" value="{{ $pet->breed }}"></div>
    <div class="mb-3"><label>Edad *</label>
      <input type="number" name="age" class="form-control" value="{{ $pet->age }}" required></div>
    <div class="mb-3"><label>Dueño *</label>
      <input type="text" name="owner_name" class="form-control" value="{{ $pet->owner_name }}" required></div>
    <div class="mb-3"><label>Vacunado *</label>
      <select name="vaccinated" class="form-control" required>
        <option value="1" {{ $pet->vaccinated ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ !$pet->vaccinated ? 'selected' : '' }}>No</option>
      </select></div>
    <button class="btn btn-success">Actualizar</button>
  </form>
</div>
<script src="{{ asset('js/validaciones.js') }}"></script>
@endsection
