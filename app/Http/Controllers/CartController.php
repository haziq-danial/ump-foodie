<?php

namespace App\Http\Controllers;

use App\Classes\Constants\CartStatus;
use App\Models\Cart;
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
        
        $orders = $cart->order_lists;
        $count = 1;

        return view('ManageCart.index', [
            'order_lists' => $orders,
            'count' => $count
        ]);
    }
}
