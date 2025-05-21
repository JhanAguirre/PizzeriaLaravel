<?php

 use App\Http\Controllers\ProfileController;
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\ClientsController;
 use App\Http\Controllers\employeesController;
 use App\Http\Controllers\Extra_IngredientsController;
 use App\Http\Controllers\OrderController;
 use App\Http\Controllers\OrderExtraIngredientController;
 use App\Http\Controllers\OrderPizzaController;
 
 use App\Http\Controllers\BranchController;
 use App\Http\Controllers\raw_materialsController;
 use App\Http\Controllers\SupplierController;
 use App\Http\Controllers\PurchaseController;
 use App\Http\Controllers\PizzaRawMaterialController;

 use App\Http\Controllers\pizzaController;
 use App\Http\Controllers\ingredientsController;
 use App\Http\Controllers\pizza_sizeController;
 use App\Http\Controllers\pizza_ingredientController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::get ('/users/create', [UserController::class,'create'])->name('users.create');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put( '/users/{id}', [UserController::class,'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

    Route::get('/clients', [ClientsController::class,'index'])->name('clients.index');
    Route::post('/clients', [ClientsController::class,'store'])->name('clients.store');
    Route::get('/clients/create', [ClientsController::class,'create'])->name('clients.create');
    Route::delete('/clients/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy');
    Route::put( '/clients/{id}', [ClientsController::class,'update'])->name('clients.update');
    Route::get('/clients/{id}/edit', [ClientsController::class, 'edit'])->name('clients.edit');

    Route::get('/employees', [employeesController::class,'index'])->name('employees.index');
    Route::get('/employees/create', [employeesController::class,'create'])->name('employees.create');
    Route::post('/employees', [employeesController::class,'store'])->name('employees.store');
    Route::put( '/employees/{id}', [employeesController::class,'update'])->name('employees.update');
    Route::get('/employees/{id}/edit', [employeesController::class, 'edit'])->name('employees.edit');
    Route::delete('/employees/{id}', [employeesController::class, 'destroy'])->name('employees.destroy');

    Route::get('/extra_ingredients', [Extra_IngredientsController::class,'index'])->name('extra_ingredients.index');
    Route::post('/extra_ingredients', [Extra_IngredientsController::class, 'store'])->name('extra_ingredients.store');
    Route::get('/extra_ingredients/create', [Extra_IngredientsController::class,'create'])->name('extra_ingredients.create');
    Route::delete('/extra_ingredients/{id}', [Extra_IngredientsController::class, 'destroy'])->name('extra_ingredients.destroy');
    Route::put('/extra_ingredients/{id}', [Extra_IngredientsController::class, 'update'])->name('extra_ingredients.update');
    Route::get('/extra_ingredients/{id}/edit', [Extra_IngredientsController::class, 'edit'])->name('extra_ingredients.edit');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');

    Route::get('/order_extra_ingredient', [OrderExtraIngredientController::class, 'index'])->name('order_extra_ingredient.index');
    Route::post('/order_extra_ingredient', [OrderExtraIngredientController::class, 'store'])->name('order_extra_ingredient.store');
    Route::get('/order_extra_ingredient/create', [OrderExtraIngredientController::class, 'create'])->name('order_extra_ingredient.create');
    Route::delete('/order_extra_ingredient{id}', [OrderExtraIngredientController::class, 'destroy'])->name('order_extra_ingredient.destroy');
    Route::put('/order_extra_ingredient{id}', [OrderExtraIngredientController::class, 'update'])->name('order_extra_ingredient.update');
    Route::get('/order_extra_ingredient{id}/edit', [OrderExtraIngredientController::class, 'edit'])->name('order_extra_ingredient.edit');

    Route::get('/order_pizza', [OrderPizzaController::class, 'index'])->name('order_pizza.index');
    Route::post('/order_pizza', [OrderPizzaController::class, 'store'])->name('order_pizza.store');
    Route::get('/order_pizza/create', [OrderPizzaController::class, 'create'])->name('order_pizza.create');
    Route::delete('/order_pizza/{order_pizza}', [OrderPizzaController::class, 'destroy'])->name('order_pizza.destroy');
    Route::put('/order_pizza/{orderPizza}', [OrderPizzaController::class, 'update'])->name('order_pizza.update');
    Route::get('/order_pizza/{orderPizza}/edit', [OrderPizzaController::class, 'edit'])->name('order_pizza.edit');

    Route::resource('branches', BranchController::class);

    // Rutas de suppliers (proveedores)
    Route::resource('suppliers', SupplierController::class);

    // Rutas de raw_materials (Materiales)
    Route::resource('raw_materials', raw_materialsController::class); 

    // Rutas de Purchases 
    Route::resource('purchases', PurchaseController::class);

    // Rutas de pizza_raw_materials 
    Route::resource('pizza_raw_materials', PizzaRawMaterialController::class);

    Route::get('/pizza', [pizzaController::class,'index'])->name('pizzas.index');
    Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
    Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
    Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
    Route::delete('/pizza/{id}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
    Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->name('pizzas.show');
    Route::put('/pizzas/{id}', [PizzaController::class, 'update'])->name('pizzas.update');
    
    Route::get('/ingredients', [ingredientsController::class,'index'])->name('ingredents.index');
    Route::get('/ingredients/create', [ingredientsController::class, 'create'])->name('ingredients.create');
    Route::post('/ingredients', [ingredientsController::class, 'store'])->name('ingredients.store');
    Route::put('/ingredients/{ingredient}', [ingredientsController::class, 'update'])->name('ingredients.update');
    Route::get('ingredients/{ingredient}/edit', [ingredientsController::class, 'edit'])->name('ingredients.edit');
    Route::delete('/ingredients/{id}', [ingredientsController::class, 'destroy'])->name('ingredients.destroy');

    Route::get('/piza_size', [pizza_sizeController::class,'index'])->name('piza_size.index');
    Route::get('/piza_size/create', [pizza_sizeController::class, 'create'])->name('piza_size.create');
    Route::post('/piza_size', [pizza_sizeController::class, 'store'])->name('piza_size.store');
    Route::get('/piza_size/{pizza_size}/edit', [pizza_sizeController::class, 'edit'])->name('piza_size.edit');
    Route::put('/piza_size/{pizza_size}', [pizza_sizeController::class, 'update'])->name('piza_size.update');
    Route::delete('/piza_size/{id}', [pizza_sizeController::class, 'destroy'])->name('piza_size.destroy');

    Route::get('/pizza_ingredient', [pizza_ingredientController::class,'index'])->name('pizza_ingredient.index');
    Route::get('/pizza_ingredient/create', [pizza_ingredientController::class, 'create'])->name('pizza_ingredient.create');
    Route::post('/pizza_ingredient', [pizza_ingredientController::class, 'store'])->name('pizza_ingredient.store');
    Route::get('/pizza_ingredient/{pizzaIngredient}/edit', [pizza_ingredientController::class, 'edit'])->name('pizza_ingredient.edit');
    Route::put('/pizza_ingredient/{pizzaIngredient}', [pizza_ingredientController::class, 'update'])->name('pizza_ingredient.update');
    Route::delete('/pizza_ingredient/{id}', [pizza_ingredientController::class, 'destroy'])->name('pizza_ingredient.destroy');

    

});



require __DIR__.'/auth.php';
