<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ingredients;
use Illuminate\Support\Facades\DB;


class ingredientsController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = DB::table('ingredients')->get();
        return view('ingredents.index', ['ingredients' => $ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredents.new');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients',
        ]);

        DB::table('ingredients')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ingredients = DB::table('ingredients')->get();
        return view('ingredents.index', ['ingredients' => $ingredients]);
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
        $ingredient = DB::table('ingredients')->find($id);
        return view('ingredents.edit', ['ingredient' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name,' . $id,
        ]);

        DB::table('ingredients')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'updated_at' => now(),
            ]);

        $ingredients = DB::table('ingredients')->get();
        return view('ingredents.index', ['ingredients' => $ingredients]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ingredients')->where('id', $id)->delete();

        $ingredients = DB::table('ingredients')->get();
        return view('ingredents.index', ['ingredients' => $ingredients]);
    }
}