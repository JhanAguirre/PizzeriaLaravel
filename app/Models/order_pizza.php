<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model // Corregido: Nombre de la clase en PascalCase
{
    use HasFactory;

    protected $table = 'order_pizzas'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id';
    public $timestamps = true; // Corregido: Laravel espera timestamps por defecto

    protected $fillable = [
        'customer_name',
        'delivery_address',
        'total_price',
        'status',
        // Otros campos que puedas tener en tu tabla de órdenes
    ];

    protected $casts = [
        'total_price' => 'float', // Asegúrate de castear el precio a float
    ];

    // Relación muchos a muchos con Pizzas
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'order_pizza_pizza', 'order_pizza_id', 'pizza_id')
                    ->withPivot('quantity') // Si tienes una cantidad por pizza en la orden
                    ->withTimestamps();
    }

    // Relación muchos a muchos con ExtraIngredients
    public function extraIngredients()
    {
        return $this->belongsToMany(ExtraIngredient::class, 'order_pizza_extra_ingredient', 'order_pizza_id', 'extra_ingredient_id')
                    ->withPivot('quantity') // Si tienes una cantidad por ingrediente en la orden
                    ->withTimestamps();
    }

    // Manteniendo la relación que ya tenías, si es necesaria
    public function pizzaSize()
    {
        return $this->belongsTo(PizzaSize::class, 'pizza_size_id');
    }
}