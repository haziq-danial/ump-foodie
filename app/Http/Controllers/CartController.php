<?php

namespace App\Http\Controllers;

use App\Classes\Constants\CartStatus;
use App\Classes\Constants\DeliveryStatus;
use App\Classes\Constants\OrderStatus;
use App\Models\Cart;
use App\Models\Delivery_list;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        // get cust model
        $cust = session('user');

        $cart = Cart::with('order_lists')
                        ->where('cust_id', $cust['cust_id'])
                        ->where('cart_status', CartStatus::NOT_CHECKOUT)
                        ->first();
        
        // dd($cart);
        if (!is_null($cart)) {

            $orders = $cart->order_lists;
            $count = 1;
    
            return view('ManageCart.index', [
                'order_lists' => $orders,
                'count' => $count
            ]);
        } else {
            $orders = [];
            $count = 1;

            return view('ManageCart.index', [
                'order_lists' => $orders,
                'count' => $count
            ]);
        }
    }

    public function checkoutCart()
    {
        // get cust model
        $cust = session('user');

        $cart = Cart::with('order_lists')
                        ->where('cust_id', $cust['cust_id'])
                        ->where('cart_status', CartStatus::NOT_CHECKOUT)
                        ->first();

        // dd($cart);
        $orders = $cart->order_lists;


        foreach ($orders as $order) {

            $order->order_status = OrderStatus::ORDERED;

            $delivery = new Delivery_list;
            $delivery->rider_id = 0;
            $delivery->order_id = $order->order_id;
            
            $delivery->feedback = 'none';
            $delivery->delivery_status = DeliveryStatus::PREPARED;

            $delivery->save();

            $order->save();
        }

        $cart->cart_status = CartStatus::CHECKOUT;
        $cart->save();



        return redirect()->route('manage-cart.index');
    }

    
}
