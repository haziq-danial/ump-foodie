<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_list extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'restaurant_id',
        'food_name',
        'category',
        'price',
        'food_status'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'restaurant_id');
    }
}
