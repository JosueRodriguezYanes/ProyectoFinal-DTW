<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
{
    $pets = Pet::all();
    $titulo = "Listado de Mascotas";
    return view('pets.index', compact('pets', 'titulo'));
}

public function create()
{
    $titulo = "Crear Nueva Mascota";
    return view('pets.create', compact('titulo'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'owner_name' => 'required|string|max:255',
            'vaccinated' => 'required|boolean'
        ]);

        Pet::create($validated);

        return redirect()->route('pets.index')->with('success', 'Mascota creada correctamente');
    }

    public function show(Pet $pet)
    {
        view()->share('hide_logo', true); 
        $this->authorize('view', $pet);
        return view('pets.show', compact('pet'))->with('titulo', 'Detalle de Mascota');
    }

    public function edit(Pet $pet)
{
    $titulo = "Editar Mascota: " . $pet->name;
    $ruta = 'pets.edit'; // Nombre de la ruta para el formulario de edición
    return view('pets.edit', compact('pet', 'titulo', 'ruta'));
}
    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'owner_name' => 'required|string|max:255',
            'vaccinated' => 'required|boolean'
        ]);

        $pet->update($validated);

        return redirect()->route('pets.index')->with('success', 'Mascota actualizada correctamente');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Mascota eliminada correctamente');
    }
 public function externalData()
{
    $titulo = "Datos Externos de Mascotas";
    return view('pets.external_data', compact('titulo'));
}
}