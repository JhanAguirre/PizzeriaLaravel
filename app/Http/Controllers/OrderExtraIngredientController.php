<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use App\Models\Order;
use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderExtraIngredients = OrderExtraIngredient::with(['order', 'extraIngredient'])->get();
        return view('order_extra_ingredient.index', compact('orderExtraIngredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $extraIngredients = ExtraIngredient::all();
        return view('order_extra_ingredient.new', compact('orders', 'extraIngredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderExtraIngredient::create($request->all());

        return redirect()->route('order_extra_ingredient.index')->with('success', 'Registro agregado correctamente.');
  
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
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
    $orders = Order::all();
    $extraIngredients = ExtraIngredient::all();

    return view('order_extra_ingredient.edit', compact('orderExtraIngredient', 'orders', 'extraIngredients'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $item = OrderExtraIngredient::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('order_extra_ingredient.index')->with('success', 'Registro actualizado correctamente.');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = OrderExtraIngredient::findOrFail($id);
        $item->delete();

        return redirect()->route('order_extra_ingredient.index')->with('success', 'Registro eliminado correctamente.');
  
    }
}
