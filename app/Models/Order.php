<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'branch_id',
        'total_price',
        'status',
        'delivery_type',
        'delivery_person_id',
    ];

  
    public function client()
    {
        return $this->belongsTo(Client::class)->with('user');
    }

    public function deliveryPerson()
    {
        return $this->belongsTo(Employees::class, 'delivery_person_id')->with('user');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function pizzaSize()
    {
        return $this->belongsTo(PizzaSize::class, 'pizza_size_id');
    }



   
    public function pizzas()
    {
        return $this->hasMany(OrderPizza::class);
    }

    
  
    public function extraIngredients()
    {
        return $this->hasMany(OrderExtraIngredient::class);
    }
}