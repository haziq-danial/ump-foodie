<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider_commission extends Model
{
    use HasFactory;

    protected $primaryKey = 'commission_id';

    protected $fillable = [
        'rider_id',
        'commission_price'
    ];
}
