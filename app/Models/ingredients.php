<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredients extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'stock_quantity',
        'unit', 
    ];
    
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'ingredient_pizza')
                    ->withTimestamps();
    }
}
