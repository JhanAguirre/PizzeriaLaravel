<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PizzaController; // Importa tu PizzaController
use App\Http\Controllers\api\BranchController; // Importa tu BranchController
use App\Http\Controllers\api\ExtraIngredientController; // ¡NUEVO! Importa tu ExtraIngredientController

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Ruta de autenticación de usuario (típicamente usada por Laravel Breeze/Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas de recursos para Pizzas
Route::resource('pizzas', PizzaController::class);

// Rutas de recursos para Sucursales
Route::resource('branches', BranchController::class);

// ¡NUEVO! Rutas de recursos para Ingredientes Extras
Route::resource('extra_ingredients', ExtraIngredientController::class);

// Puedes agregar otras rutas si las necesitas, por ejemplo:
// Route::get('/pizzas-by-category/{category}', [PizzaController::class, 'getPizzasByCategory']);