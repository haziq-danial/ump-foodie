<?php

namespace App\Http\Controllers;

use App\Models\Delivery_list;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery_list::with('order')->get();
        $count = 1;

        return view('ManageDelivery.index', [
            'deliveries' => $deliveries,
            'count' => $count
        ]);
    }
}
