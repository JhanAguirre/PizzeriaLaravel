<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraIngredient extends Model
{
    use HasFactory;

    protected $table = 'extra_ingredients';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'ingredient_type'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'float', // ¡IMPORTANTE! Castear 'price' a float
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_extra_ingredient', 'extra_ingredient_id', 'pizza_id')
                    ->withTimestamps();
    }

    // Relación con los pedidos (Muchos a Muchos)
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_extra_ingredient', 'extra_ingredient_id', 'order_id')
                    ->withTimestamps();
    }

}