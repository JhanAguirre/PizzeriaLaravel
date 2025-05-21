<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaRawMaterial extends Model
{
    protected $table = 'pizza_raw_material'; 
    protected $primaryKey = 'id'; 
    public $timestamps = false;
}