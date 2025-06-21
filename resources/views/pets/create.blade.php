@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Mascota</h1>
    
    <form id="petForm" action="{{ route('pets.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="species">Especie</label>
            <input type="text" class="form-control" id="species" name="species" required>
        </div>
        
        <div class="form-group">
            <label for="breed">Raza</label>
            <input type="text" class="form-control" id="breed" name="breed" required>
        </div>
        
        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" class="form-control" id="age" name="age" min="0" required>
        </div>
        
        <div class="form-group">
            <label for="owner_name">Dueño</label>
            <input type="text" class="form-control" id="owner_name" name="owner_name" required>
        </div>
        
        <div class="form-group">
            <label for="vaccinated">Vacunado</label>
            <select class="form-control" id="vaccinated" name="vaccinated" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script>
document.getElementById('petForm').addEventListener('submit', function(e) {
    const age = document.getElementById('age').value;
    if (isNaN(age) {
        e.preventDefault();
        alert('La edad debe ser un número');
        return false;
    }
    
    // Guardar último dueño en localStorage
    const owner = document.getElementById('owner_name').value;
    localStorage.setItem('last_owner', owner);
});
</script>
@endsection