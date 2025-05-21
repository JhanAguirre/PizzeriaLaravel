<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pizza_size;
use Illuminate\Support\Facades\DB;

class pizza_sizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzaSizes = DB::table('pizza_size')
            ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
            ->select('pizza_size.*', 'pizzas.name as pizza_name')
            ->get();
        return view('pizza_size.index', ['pizzaSizes' => $pizzaSizes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')
        ->orderBy('name')
        ->get();
         return view('pizza_size.new', ['pizzas' => $pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        DB::table('pizza_size')->insert([
            'pizza_id' => $request->pizza_id,
            'size' => $request->size,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $pizzaSizes = DB::table('pizza_size')
            ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
            ->select('pizza_size.*', 'pizzas.name as pizza_name')
            ->get();

        return view('pizza_size.index', ['pizzaSizes' => $pizzaSizes]);
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
        $pizzaSize = pizza_size::findOrFail($id);
        $pizzas = DB::table('pizzas')
            ->orderBy('name')
            ->get();
        return view('pizza_size.edit', ['pizzaSize' => $pizzaSize, 'pizzas' => $pizzas]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        DB::table('pizza_size')
            ->where('id', $id)
            ->update([
                'pizza_id' => $request->pizza_id,
                'size' => $request->size,
                'price' => $request->price,
                'updated_at' => now(),
            ]);

        $pizzaSizes = DB::table('pizza_size')
            ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
            ->select('pizza_size.*', 'pizzas.name as pizza_name')
            ->get();

        return view('pizza_size.index', ['pizzaSizes' => $pizzaSizes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pizza_size')->where('id', $id)->delete();

        $pizzaSizes = DB::table('pizza_size')
            ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
            ->select('pizza_size.*', 'pizzas.name as pizza_name')
            ->get();

        return view('pizza_size.index', ['pizzaSizes' => $pizzaSizes]);
    }
}
