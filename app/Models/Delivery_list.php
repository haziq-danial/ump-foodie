<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_list extends Model
{
    use HasFactory;

    protected $primaryKey = 'delivery_list_id';

    protected $fillable = [
        'rider_id',
        'order_id',
        'delivery_status',
        'feedback'
    ];


    public function order()
    {
        return $this->belongsTo(Order_list::class, 'order_id', 'order_id');
    }

    public function rider()
    {
        return $this->belongsTo(Rider::class, 'rider_id', 'rider_id');
    }
}

