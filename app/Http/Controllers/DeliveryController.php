<?php

namespace App\Http\Controllers;

use App\Classes\Constants\DeliveryStatus;
use App\Models\Delivery_list;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery_list::with('order')
                                    ->where('delivery_status', DeliveryStatus::PREPARED)->get();
        $count = 1;

        return view('ManageDelivery.index', [
            'deliveries' => $deliveries,
            'count' => $count
        ]);
    }

    public function myDeliveries()
    {
        // get rider model
        $rider = session('user');

        $deliveries = Delivery_list::with('rider')
                                    ->where('rider_id', $rider['rider_id'])
                                    ->where('delivery_status', DeliveryStatus::PICKED_UP)
                                    ->get();
        
        // dd($deliveries);
        $count = 1;
        return view('ManageDelivery.rider-delivery', [
            'deliveries' => $deliveries,
            'count' => $count
        ]);
    }
    
    public function selectOrder($delivery_list_id)
    {
        
        // get rider model
        $rider = session('user');

        $delivery = Delivery_list::find($delivery_list_id);

        $delivery->rider_id = $rider['rider_id'];
        $delivery->delivery_status = DeliveryStatus::PICKED_UP;

        $delivery->save();

        return redirect()->route('manage-delivery.index');
    }

    public function completeDelivery($delivery_list_id)
    {
        $delivery = Delivery_list::find($delivery_list_id);

        $delivery->delivery_status = DeliveryStatus::COMPLETED;
        $delivery->save();

        return redirect()->route('manage-delivery.my-deliveries');
    }

    public function previousDelivery()
    {
        // get rider model
        $rider = session('user');

        $deliveries = Delivery_list::with(['rider', 'order'])
                                    ->where('rider_id', $rider['rider_id'])
                                    ->where('delivery_status', DeliveryStatus::COMPLETED)
                                    ->get();

        $count = 1;
        return view('ManageDelivery.completed', [
            'deliveries' => $deliveries,
            'count' => $count
        ]);
    }
}
