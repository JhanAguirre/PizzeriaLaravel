<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PizzaController; // Importa tu PizzaController

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

// Rutas de recursos para Pizzas. Esto crea automáticamente las rutas:
// GET /api/pizzas (index)
// POST /api/pizzas (store)
// GET /api/pizzas/{pizza} (show)
// PUT/PATCH /api/pizzas/{pizza} (update)
// DELETE /api/pizzas/{pizza} (destroy)
// Si no quieres que estas rutas requieran autenticación, asegúrate de que no estén
// dentro de un grupo de middleware 'auth:sanctum'. Por defecto, Route::resource
// no aplica middleware de autenticación a menos que se especifique.
Route::resource('pizzas', PizzaController::class);

// Puedes agregar otras rutas si las necesitas, por ejemplo:
// Route::get('/pizzas-by-category/{category}', [PizzaController::class, 'getPizzasByCategory']);
