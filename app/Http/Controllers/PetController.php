<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class PetController extends Controller
{
    public function index()
    {
        try {
            $pets = Pet::all();
            $titulo = "Listado de Mascotas";
            return view('pets.index', compact('pets', 'titulo'));
        } catch (\Exception $e) {
            Log::error('Error al listar mascotas: ' . $e->getMessage());
            return redirect()->route('pets.index')->with('error', 'No se pudo cargar el listado de mascotas');
        }
    }

    public function create()
    {
        try {
            $titulo = "Crear Nueva Mascota";
            return view('pets.create', compact('titulo'));
        } catch (\Exception $e) {
            Log::error('Error al mostrar formulario de creación: ' . $e->getMessage());
            return redirect()->route('pets.index')->with('error', 'Error al cargar el formulario');
        }
    }

    public function store(Request $request)
    {
        try {
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
        } catch (QueryException $e) {
            Log::error('Error de base de datos al crear mascota: ' . $e->getMessage());
            return back()->with('error', 'Error al guardar la mascota en la base de datos')->withInput();
        } catch (\Exception $e) {
            Log::error('Error general al crear mascota: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado')->withInput();
        }
    }

    public function show(Pet $pet)
    {
        try {
            view()->share('hide_logo', true);
            $this->authorize('view', $pet);
            return view('pets.show', compact('pet'))->with('titulo', 'Detalle de Mascota');
        } catch (\Exception $e) {
            Log::error('Error al mostrar mascota: ' . $e->getMessage());
            return redirect()->route('pets.index')->with('error', 'No se pudo mostrar la mascota');
        }
    }

    public function edit(Pet $pet)
    {
        try {
            $titulo = "Editar Mascota: " . $pet->name;
            $ruta = 'pets.edit';
            return view('pets.edit', compact('pet', 'titulo', 'ruta'));
        } catch (\Exception $e) {
            Log::error('Error al mostrar formulario de edición: ' . $e->getMessage());
            return redirect()->route('pets.index')->with('error', 'Error al cargar el formulario de edición');
        }
    }

    public function update(Request $request, Pet $pet)
    {
        try {
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
        } catch (QueryException $e) {
            Log::error('Error de base de datos al actualizar mascota: ' . $e->getMessage());
            return back()->with('error', 'Error al actualizar la mascota en la base de datos')->withInput();
        } catch (\Exception $e) {
            Log::error('Error general al actualizar mascota: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado al actualizar')->withInput();
        }
    }

    public function destroy(Pet $pet)
    {
        try {
            $pet->delete();
            return redirect()->route('pets.index')->with('success', 'Mascota eliminada correctamente');
        } catch (QueryException $e) {
            Log::error('Error de base de datos al eliminar mascota: ' . $e->getMessage());
            return back()->with('error', 'Error al eliminar la mascota de la base de datos');
        } catch (\Exception $e) {
            Log::error('Error general al eliminar mascota: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado al eliminar');
        }
    }

    public function externalData()
    {
        try {
            $titulo = "Datos Externos de Mascotas";
            return view('pets.external_data', compact('titulo'));
        } catch (\Exception $e) {
            Log::error('Error al cargar datos externos: ' . $e->getMessage());
            return redirect()->route('pets.index')->with('error', 'No se pudo cargar la vista de datos externos');
        }
    }
}
