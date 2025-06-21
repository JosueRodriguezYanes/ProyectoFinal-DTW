<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
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

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
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
    return view('pets.external_data');
}
}