<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $primaryKey = 'restaurant_id';

    protected $fillable = [
        'owner_id',
        'restaurant_name',
        'location',
        'contact_number',
        'opening_time',
        'closing_time'
    ];
}
