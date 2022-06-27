<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'restaurant_id',
        'cart_id',
        'menu_id',
        'order_status',
        'quantity'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu_list::class, 'menu_id', 'menu_id');
    }


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id','restaurant_id');
    }
}
