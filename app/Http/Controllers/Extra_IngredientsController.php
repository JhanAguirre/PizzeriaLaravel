<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtraIngredient;

class Extra_IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extra_ingredients = ExtraIngredient::all();
        return view('extra_ingredients.index', compact('extra_ingredients'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extra_ingredients.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,999999.99',
        ]);
    
        ExtraIngredient::create($request->only('name', 'price'));
    
        return redirect()->route('extra_ingredients.index')->with('success', 'Ingrediente extra creado exitosamente.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    $ingredient = ExtraIngredient::findOrFail($id);

    
    return view('extra_ingredients.edit', compact('ingredient'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,999999.99',
        ]);

        $extra_ingredient = ExtraIngredient::findOrFail($id);
        $extra_ingredient->update($request->all());

        return redirect()->route('extra_ingredients.index')->with('success', 'Ingrediente extra actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $extra_ingredient = ExtraIngredient::findOrFail($id);
        $extra_ingredient->delete();

        return redirect()->route('extra_ingredients.index')->with('success', 'Ingrediente extra eliminado correctamente.');

    }
}
