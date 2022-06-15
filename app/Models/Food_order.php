<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_order extends Model
{
    use HasFactory;

    protected $primaryKey = 'food_order_id';


    protected $fillable = [
        'order_id',
        'quantity',
        'price'
    ];
}
