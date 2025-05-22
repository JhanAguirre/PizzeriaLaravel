<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PizzaController;
use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\ExtraIngredientController;
use App\Http\Controllers\api\OrderPizzaController; // ¡NUEVO! Importa tu OrderPizzaController

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('pizzas', PizzaController::class);
Route::resource('branches', BranchController::class);
Route::resource('extra_ingredients', ExtraIngredientController::class);

// ¡NUEVO! Rutas de recursos para Órdenes de Pizza
Route::resource('order_pizzas', OrderPizzaController::class);