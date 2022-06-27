<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'cust_id',
        'cart_status',
        'total_price'
    ];

    public function order_lists()
    {
        return $this->hasMany(Order_list::class, 'cart_id', 'cart_id');
    }
}
