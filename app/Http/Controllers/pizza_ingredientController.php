<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaIngredient;
use Illuminate\Support\Facades\DB;

class pizza_ingredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzaIngredients = DB::table('pizza_ingredient')
            ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
            ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
            ->select(
                'pizza_ingredient.*',
                'pizzas.name as pizza_nombre', 
                'ingredients.name as ingredient_nombre' 
            )
            ->get();
        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);
   
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')
            ->orderBy('name') 
            ->get();

        $ingredients = DB::table('ingredients')
            ->orderBy('name') 
            ->get();

        return view('pizza_ingredient.new', ['pizzas' => $pizzas, 'ingredients' => $ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        DB::table('pizza_ingredient')->insert([
            'pizza_id' => $request->pizza_id,
            'ingredient_id' => $request->ingredient_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $pizzaIngredients = DB::table('pizza_ingredient')
            ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
            ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
            ->select(
                'pizza_ingredient.*',
                'pizzas.name as pizza_nombre', 
                'ingredients.name as ingredient_nombre' 
            )
            ->get();

        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);

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
        $pizzaIngredient = DB::table('pizza_ingredient')->find($id);
        
        $pizzas = DB::table('pizzas')
         ->orderBy('name')
         ->get();
      
        $ingredients = DB::table('ingredients')
         ->orderBy('name')
         ->get();
      
        return view('pizza_ingredient.edit', ['pizzaIngredient' => $pizzaIngredient, 'pizzas' => $pizzas, 'ingredients' => $ingredients]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        DB::table('pizza_ingredient')
            ->where('id', $id)
            ->update([
                'pizza_id' => $request->pizza_id,
                'ingredient_id' => $request->ingredient_id,
                'updated_at' => now(),
            ]);

        $pizzaIngredients = DB::table('pizza_ingredient')
            ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
            ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
            ->select(
                'pizza_ingredient.*',
                'pizzas.name as pizza_nombre', 
                'ingredients.name as ingredient_nombre' 
            )
            ->get();

        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pizza_ingredient')->where('id', $id)->delete();

        $pizzaIngredients = DB::table('pizza_ingredient')
         ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
         ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
         ->select(
          'pizza_ingredient.*',
          'pizzas.name as pizza_nombre',
          'ingredients.name as ingredient_nombre'
         )
         ->get();
      
        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);
       
    }
}
