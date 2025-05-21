<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaSize extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'pizza_size';
    public $timestamps = true;

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    }
}
