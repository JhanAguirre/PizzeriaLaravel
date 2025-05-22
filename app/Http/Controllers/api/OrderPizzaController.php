<?php

namespace App\Http\Controllers\api; // Asegúrate de que el namespace sea 'api'

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderPizza; // ¡IMPORTANTE! Asegúrate de que el nombre de la clase sea 'OrderPizza'
use App\Models\Pizza; // Necesario para la relación con pizzas
use App\Models\ExtraIngredient; // Necesario para la relación con ingredientes extras

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todas las órdenes de pizza.
     */
    public function index()
    {
        // Cargar las relaciones 'pizzas' y 'extraIngredients' para el listado
        $orderPizzas = OrderPizza::with(['pizzas', 'extraIngredients'])->get();
        // Retorna las órdenes como una respuesta JSON
        return response()->json(['orderPizzas' => $orderPizzas]);
    }

    /**
     * Store a newly created resource in storage.
     * Almacena una nueva orden de pizza en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos de entrada
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'pizzas' => 'array', // Array de IDs de pizzas
            'pizzas.*' => 'exists:pizzas,id', // Cada ID debe existir en la tabla pizzas
            'extra_ingredients' => 'array', // Array de IDs de ingredientes extras
            'extra_ingredients.*' => 'exists:extra_ingredients,id', // Cada ID debe existir
        ]);

        // Crea una nueva instancia del modelo OrderPizza y asigna los valores
        $orderPizza = OrderPizza::create([
            'customer_name' => $request->customer_name,
            'delivery_address' => $request->delivery_address,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        // Sincronizar pizzas y extra_ingredients (adjuntar/desadjuntar relaciones)
        if ($request->has('pizzas')) {
            $orderPizza->pizzas()->sync($request->pizzas);
        } else {
            $orderPizza->pizzas()->detach(); // Si no se envían pizzas, desvincula todas
        }

        if ($request->has('extra_ingredients')) {
            $orderPizza->extraIngredients()->sync($request->extra_ingredients);
        } else {
            $orderPizza->extraIngredients()->detach(); // Si no se envían ingredientes, desvincula todos
        }

        // Retorna una respuesta JSON con éxito y la orden creada
        return response()->json(['success' => true, 'message' => 'Orden de pizza creada correctamente', 'orderPizza' => $orderPizza], 201); // 201 Created
    }

    /**
     * Display the specified resource.
     * Muestra los detalles de una orden de pizza específica.
     */
    public function show(string $id)
    {
        // Busca la orden por su ID y carga las relaciones 'pizzas' y 'extraIngredients'
        $orderPizza = OrderPizza::with(['pizzas', 'extraIngredients'])->find($id);

        // Si la orden no se encuentra, retorna un error 404
        if (!$orderPizza) {
            return response()->json(['message' => 'Orden de pizza no encontrada'], 404);
        }

        // Retorna la orden encontrada como una respuesta JSON
        return response()->json(['orderPizza' => $orderPizza]);
    }

    /**
     * Update the specified resource in storage.
     * Actualiza una orden de pizza existente en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos de entrada
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'pizzas' => 'array',
            'pizzas.*' => 'exists:pizzas,id',
            'extra_ingredients' => 'array',
            'extra_ingredients.*' => 'exists:extra_ingredients,id',
        ]);

        // Busca la orden por su ID
        $orderPizza = OrderPizza::find($id);

        // Si la orden no se encuentra, retorna un error 404
        if (!$orderPizza) {
            return response()->json(['message' => 'Orden de pizza no encontrada'], 404);
        }

        $orderPizza->update([
            'customer_name' => $request->customer_name,
            'delivery_address' => $request->delivery_address,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        // Sincronizar pizzas y extra_ingredients
        if ($request->has('pizzas')) {
            $orderPizza->pizzas()->sync($request->pizzas);
        } else {
            $orderPizza->pizzas()->detach();
        }

        if ($request->has('extra_ingredients')) {
            $orderPizza->extraIngredients()->sync($request->extra_ingredients);
        } else {
            $orderPizza->extraIngredients()->detach();
        }

        // Retorna una respuesta JSON con éxito y la orden actualizada
        return response()->json(['success' => true, 'message' => 'Orden de pizza actualizada correctamente', 'orderPizza' => $orderPizza]);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una orden de pizza de la base de datos.
     */
    public function destroy(string $id)
    {
        // Busca la orden por su ID
        $orderPizza = OrderPizza::find($id);

        // Si la orden no se encuentra, retorna un error 404
        if (!$orderPizza) {
            return response()->json(['message' => 'Orden de pizza no encontrada'], 404);
        }

        // Desvincular relaciones antes de eliminar la orden
        $orderPizza->pizzas()->detach();
        $orderPizza->extraIngredients()->detach();

        // Elimina la orden
        $orderPizza->delete();

        // Retorna una respuesta JSON con éxito
        return response()->json(['success' => true, 'message' => 'Orden de pizza eliminada correctamente']);
    }
}