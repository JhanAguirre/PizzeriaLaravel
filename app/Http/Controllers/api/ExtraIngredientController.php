<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtraIngredient; // Importa tu modelo ExtraIngredient

class ExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todos los ingredientes extras.
     */
    public function index()
    {
        $extraIngredients = ExtraIngredient::all();
        return response()->json(['extraIngredients' => $extraIngredients]);
    }

    /**
     * Store a newly created resource in storage.
     * Almacena un nuevo ingrediente extra en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Crea una nueva instancia del modelo ExtraIngredient y asigna los valores
        $extraIngredient = ExtraIngredient::create($request->all());

        // Retorna una respuesta JSON con éxito y el ingrediente extra creado
        return response()->json(['success' => true, 'message' => 'Ingrediente extra creado correctamente', 'extraIngredient' => $extraIngredient], 201); // 201 Created
    }

    /**
     * Display the specified resource.
     * Muestra los detalles de un ingrediente extra específico.
     */
    public function show(string $id)
    {
        // Busca el ingrediente extra por su ID
        $extraIngredient = ExtraIngredient::find($id);

        // Si el ingrediente extra no se encuentra, retorna un error 404
        if (!$extraIngredient) {
            return response()->json(['message' => 'Ingrediente extra no encontrado'], 404);
        }

        // Retorna el ingrediente extra encontrado como una respuesta JSON
        return response()->json(['extraIngredient' => $extraIngredient]);
    }

    /**
     * Update the specified resource in storage.
     * Actualiza un ingrediente extra existente en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Busca el ingrediente extra por su ID
        $extraIngredient = ExtraIngredient::find($id);

        // Si el ingrediente extra no se encuentra, retorna un error 404
        if (!$extraIngredient) {
            return response()->json(['message' => 'Ingrediente extra no encontrado'], 404);
        }

        // Actualiza el ingrediente extra con los datos validados
        $extraIngredient->update($request->all());

        // Retorna una respuesta JSON con éxito y el ingrediente extra actualizado
        return response()->json(['success' => true, 'message' => 'Ingrediente extra actualizado correctamente', 'extraIngredient' => $extraIngredient]);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina un ingrediente extra de la base de datos.
     */
    public function destroy(string $id)
    {
        // Busca el ingrediente extra por su ID
        $extraIngredient = ExtraIngredient::find($id);

        // Si el ingrediente extra no se encuentra, retorna un error 404
        if (!$extraIngredient) {
            return response()->json(['message' => 'Ingrediente extra no encontrado'], 404);
        }

        // Elimina el ingrediente extra
        $extraIngredient->delete();

        // Retorna una respuesta JSON con éxito
        return response()->json(['success' => true, 'message' => 'Ingrediente extra eliminado correctamente']);
    }
}