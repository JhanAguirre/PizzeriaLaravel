<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza; // Importa tu modelo Pizza

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todas las pizzas de la base de datos
        $pizzas = Pizza::all();
        // Retorna las pizzas como una respuesta JSON
        return response()->json(['pizzas' => $pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos de entrada de la petición
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Crea una nueva pizza con los datos validados
        $pizza = Pizza::create($request->all());
        // Retorna una respuesta JSON con éxito y la pizza creada
        return response()->json(['success' => true, 'message' => 'Pizza creada correctamente', 'pizza' => $pizza], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca una pizza por su ID
        $pizza = Pizza::find($id);
        // Si la pizza no se encuentra, retorna un error 404
        if (!$pizza) {
            return response()->json(['message' => 'Pizza no encontrada'], 404);
        }
        // Retorna la pizza encontrada como una respuesta JSON
        return response()->json(['pizza' => $pizza]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos de entrada de la petición
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Busca una pizza por su ID
        $pizza = Pizza::find($id);
        // Si la pizza no se encuentra, retorna un error 404
        if (!$pizza) {
            return response()->json(['message' => 'Pizza no encontrada'], 404);
        }
        // Actualiza la pizza con los datos validados
        $pizza->update($request->all());
        // Retorna una respuesta JSON con éxito y la pizza actualizada
        return response()->json(['success' => true, 'message' => 'Pizza actualizada correctamente', 'pizza' => $pizza]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca una pizza por su ID
        $pizza = Pizza::find($id);
        // Si la pizza no se encuentra, retorna un error 404
        if (!$pizza) {
            return response()->json(['message' => 'Pizza no encontrada'], 404);
        }
        // Elimina la pizza
        $pizza->delete();
        // Retorna una respuesta JSON con éxito
        return response()->json(['success' => true, 'message' => 'Pizza eliminada correctamente']);
    }
}