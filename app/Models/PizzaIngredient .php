<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaIngredient  extends Model
{
    use HasFactory;

    protected $table = 'pizza_ingredient';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class);     }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class); 
    }
}
