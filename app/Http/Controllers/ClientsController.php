<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.*', 'users.name as user_name')
            ->latest('clients.created_at')
            ->paginate(10);

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')->get();
        return view('client.new', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);
    
        try {
            DB::table('clients')->insert([
                'user_id' => $request->user_id,
                'address' => $request->address,
                'phone' => $request->phone,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el cliente: ' . $e->getMessage()]);
        }

        

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
        $client = DB::table('clients')->where('id', $id)->first();

        if (!$client) {
            return redirect()->route('clients.index')->withErrors(['error' => 'Cliente no encontrado.']);
        }

        $users = DB::table('users')->get();

        return view('client.edit', compact('client', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);
    
        $client = DB::table('clients')->where('id', $id)->first();
    
        if (!$client) {
            return redirect()->route('clients.index')->withErrors(['error' => 'Cliente no encontrado.']);
        }
    
        try {
            DB::table('clients')->where('id', $id)->update([
                'user_id' => $request->user_id,
                'address' => $request->address,
                'phone' => $request->phone,
                'updated_at' => now(),
            ]);
    
            return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('clients.index')->withErrors(['error' => 'Error al actualizar el cliente: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = DB::table('clients')->where('id', $id)->first();

    if (!$client) {
        return redirect()->route('clients.index')->withErrors(['error' => 'Cliente no encontrado.']);
    }

    try {
        DB::table('clients')->where('id', $id)->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente.');
    } catch (\Exception $e) {
        return redirect()->route('clients.index')->withErrors(['error' => 'Error al eliminar el cliente: ' . $e->getMessage()]);
    }
    }
}
