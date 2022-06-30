<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint_list extends Model
{
    use HasFactory;

    protected $primaryKey = 'complaint_list_id';

    protected $fillable = [
        'delivery_list_id',
        'cust_id',
        'rider_id',
        'description',
        'type',
        'status'
    ];

    public function delivery()
    {
        return $this->belongsTo(Delivery_list::class, 'delivery_list_id', 'delivery_list_id');
    }
}
