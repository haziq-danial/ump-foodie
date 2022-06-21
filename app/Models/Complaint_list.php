<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint_list extends Model
{
    use HasFactory;

    protected $primaryKey = 'complaint_list_id';

    protected $fillable = [
        'order_id',
        'cust_id',
        'rider_id',
        'description',
        'type',
        'status'
    ];
}
