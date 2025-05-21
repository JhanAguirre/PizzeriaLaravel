<?php

namespace App\Http\Controllers\api; // Asegúrate de que el namespace sea 'api'

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch; // Importa tu modelo Branch

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todas las sucursales.
     */
    public function index()
    {
        $branches = Branch::all();
        // Retorna las sucursales como una respuesta JSON
        return response()->json(['branches' => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     * Almacena una nueva sucursal en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Crea una nueva instancia del modelo Branch y asigna los valores
        $branch = Branch::create($request->all()); // Usando mass assignment gracias a $fillable

        // Retorna una respuesta JSON con éxito y la sucursal creada
        return response()->json(['success' => true, 'message' => 'Sucursal creada correctamente', 'branch' => $branch], 201); // 201 Created
    }

    /**
     * Display the specified resource.
     * Muestra los detalles de una sucursal específica.
     */
    public function show(string $id)
    {
        // Busca la sucursal por su ID
        $branch = Branch::find($id);

        // Si la sucursal no se encuentra, retorna un error 404
        if (!$branch) {
            return response()->json(['message' => 'Sucursal no encontrada'], 404);
        }

        // Retorna la sucursal encontrada como una respuesta JSON
        return response()->json(['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     * Actualiza una sucursal existente en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Busca la sucursal por su ID
        $branch = Branch::find($id);

        // Si la sucursal no se encuentra, retorna un error 404
        if (!$branch) {
            return response()->json(['message' => 'Sucursal no encontrada'], 404);
        }

        // Actualiza la sucursal con los datos validados
        $branch->update($request->all()); // Usando mass assignment

        // Retorna una respuesta JSON con éxito y la sucursal actualizada
        return response()->json(['success' => true, 'message' => 'Sucursal actualizada correctamente', 'branch' => $branch]);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una sucursal de la base de datos.
     */
    public function destroy(string $id)
    {
        // Busca la sucursal por su ID
        $branch = Branch::find($id);

        // Si la sucursal no se encuentra, retorna un error 404
        if (!$branch) {
            return response()->json(['message' => 'Sucursal no encontrada'], 404);
        }

        // Elimina la sucursal
        $branch->delete();

        // Retorna una respuesta JSON con éxito
        return response()->json(['success' => true, 'message' => 'Sucursal eliminada correctamente']);
    }
}
