<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order_pizza;

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderPizzas = DB::table('order_pizza')
        ->join('orders', 'order_pizza.order_id', '=', 'orders.id')
        ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
        ->select(
            'order_pizza.*',
            'orders.id as order_id',
            'orders.created_at as order_created_at',
            'pizza_size.size as pizza_size_name', 
            'pizza_size.price as pizza_size_price'
        )
        ->get();
        

    return view('order_pizza.index', compact('orderPizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = DB::table('orders')
        ->orderBy('id')
        ->get();

    $pizzaSizes = DB::table('pizza_size')
        ->orderBy('id')
        ->get();

    return view('order_pizza.new', [
        'orders' => $orders,
        'pizzaSizes' => $pizzaSizes
    ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderPizza = new order_pizza();

        $orderPizza->order_id = $request->order_id;
        $orderPizza->pizza_size_id = $request->pizza_size_id;
        $orderPizza->quantity = $request->quantity;
        $orderPizza->save();

        $orderPizzas = DB::table('order_pizza')
            ->join('orders', 'order_pizza.order_id', '=', 'orders.id')
            ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
            ->select(
                'order_pizza.*',
                'orders.id as order_id',
                'orders.created_at as order_created_at',
                'pizza_size.price as pizza_size_price'
            )
            ->get();

        return view('order_pizza.index', ['orderPizzas' => $orderPizzas]); 
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
        $orderPizza = order_pizza::find($id);

        $orders = DB::table('orders')
            ->orderBy('id')
            ->get();

        $pizzaSizes = DB::table('pizza_size')
            ->orderBy('id')
            ->get();

        return view('order_pizza.edit', [
            'orderPizza' => $orderPizza,
            'orders' => $orders,
            'pizzaSizes' => $pizzaSizes
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderPizza = order_pizza::find($id);

        $orderPizza->order_id = $request->order_id;
        $orderPizza->pizza_size_id = $request->pizza_size_id;
        $orderPizza->quantity = $request->quantity;
        $orderPizza->save();

        $orderPizzas = DB::table('order_pizza')
            ->join('orders', 'order_pizza.order_id', '=', 'orders.id')
            ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
            ->select(
                'order_pizza.*',
                'orders.id as order_id',
                'orders.created_at as order_created_at',
                'pizza_size.price as pizza_size_price'
            )
            ->get();

        return view('order_pizza.index', ['orderPizzas' => $orderPizzas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderPizza = order_pizza::find($id);
        $orderPizza->delete();

        $orderPizzas = DB::table('order_pizza')
            ->join('orders', 'order_pizza.order_id', '=', 'orders.id')
            ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
            ->select(
                'order_pizza.*',
                'orders.id as order_id',
                'orders.created_at as order_created_at',
                'pizza_size.price as pizza_size_price'
            )
            ->get();

        return view('order_pizza.index', ['orderPizzas' => $orderPizzas]);
    }
}
