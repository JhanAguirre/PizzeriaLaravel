<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizza extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $table = 'pizzas';
    public $timestamps = true;


    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_pizza');
    }
}
