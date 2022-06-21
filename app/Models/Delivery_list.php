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
}

