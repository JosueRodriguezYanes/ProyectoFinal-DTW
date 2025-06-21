@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Mascotas</h1>
    
    @can('create', App\Models\Pet::class)
    <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">Nueva Mascota</a>
    @endcan

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Dueño</th>
                    <th>Vacunado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->species }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>{{ $pet->age }}</td>
                    <td>{{ $pet->owner_name }}</td>
                    <td>{{ $pet->vaccinated ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('pets.show', $pet) }}" class="btn btn-sm btn-info">Ver</a>
                        @can('update', $pet)
                        <a href="{{ route('pets.edit', $pet) }}" class="btn btn-sm btn-warning">Editar</a>
                        @endcan
                        @can('delete', $pet)
                        <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection