<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pizza;

class pizzaController extends Controller
{
    public function index()
    {
        $pizzas = pizza::all();

        return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Crear una nueva pizza
    $pizza = new Pizza();
    $pizza->name = $validatedData['name'];
    $pizza->save();

    // Redirigir a la lista de pizzas con un mensaje de éxito
    return redirect()->route('pizzas.index')->with('success', 'Pizza creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza = Pizza::findOrFail($id); // Cambia a Pizza
        return view('pizzas.show', compact('pizza')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pizza = Pizza::findOrFail($id); 
        return view('pizzas.edit', ['pizza' => $pizza]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pizza = Pizza::findOrFail($id);
        $pizza->name = $validatedData['name'];
        $pizza->save();

        return redirect()->route('pizzas.index')->with('success', 'Pizza actualizada con éxito.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    $pizza = Pizza::find($id); // O Pizza::findOrFail($id);

    if (!$pizza) {
        return redirect()->route('pizzas.index')->with('error', 'Pizza no encontrada.');
    }

    $pizza->delete();

    return redirect()->route('pizzas.index')->with('success', 'Pizza eliminada con éxito.');


    }
}