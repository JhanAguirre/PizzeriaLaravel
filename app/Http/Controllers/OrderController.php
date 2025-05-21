<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Branch;
use App\Models\Employees;
use App\Models\PizzaSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['client', 'deliveryPerson', 'branch'])->paginate(10); // Carga las relaciones
        return view('orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::with('user')->get();
        $branches = Branch::all();
        $employees = Employees::with('user')->get(); 
        $pizzaSizes = PizzaSize::all();  
        return view('orders.new', compact('clients', 'branches', 'employees', 'pizzaSizes'));   
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'pizza_size_id' => 'required|exists:pizza_size,id',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
        ]);
    
        DB::table('orders')->insert([
            'client_id' => $request->client_id,
            'branch_id' => $request->branch_id,
            'pizza_size_id' => $request->pizza_size_id,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'delivery_type' => $request->delivery_type,
            'delivery_person_id' => $request->delivery_person_id,
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
    
        return redirect()->route('orders.index')->with('success', 'Pedido creado correctamente.');
    
     
 
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
        $order = Order::findOrFail($id);
        $clients = Client::all();
        $branches = Branch::all();
        $employees = Employee::all();

        return view('orders.edit', compact('order', 'clients', 'branches', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'pizza_size_id' => 'required|exists:pizza_size,id', // Assuming you've corrected this
            'total_price' => 'required|numeric',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
        ]);
    
        Order::create([
            'client_id' => $request->client_id,
            'branch_id' => $request->branch_id,
            'pizza_size_id' => $request->pizza_size_id, // You ARE providing this value here
            'total_price' => $request->total_price,
            'status' => $request->status,
            'delivery_type' => $request->delivery_type,
            'delivery_person_id' => $request->delivery_person_id,
        ]);
    
        return redirect()->route('orders.index')->with('success', 'Pedido creado correctamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado correctamente.');
    

    }
}
