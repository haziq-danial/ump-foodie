<?php

namespace App\Http\Controllers;

use App\Classes\Constants\CartStatus;
use App\Classes\Constants\OrderStatus;
use App\Models\Cart;
use App\Models\Menu_list;
use App\Models\Order_List;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function index()
    {
        // get all menu lists from all restaurants
        $menu_lists = Menu_list::with('restaurant')->get();

        $count = 1;

        return view('ManageOrder.makeOrder', [
            'menu_lists' => $menu_lists,
            'count' => $count
        ]);
    }

    public function addToCart($menu_id)
    {
        // get user (customer)
        $user = session('user');

        // get menu
        $menu = Menu_list::with('restaurant')->find($menu_id);

        // check if there is cart that is not checked out
        $cart_model = Cart::where('cust_id', $user['cust_id'])
                            ->where('cart_status', CartStatus::NOT_CHECKOUT)
                            ->first();

        if (is_null($cart_model)) {
            // create cart
            $cart = new Cart;

            $cart->cust_id = $user['cust_id'];
            $cart->cart_status = CartStatus::NOT_CHECKOUT;
            $cart->total_price = 0.0;

            $cart->save();

            // create order list
            $order_list = new Order_List;

            $order_list->restaurant_id = $menu->restaurant_id;
            $order_list->menu_id = $menu->menu_id;
            $order_list->cart_id = $cart->cart_id;
            $order_list->order_status = OrderStatus::NOT_ORDERED;
            $order_list->quantity = 1;

            $order_list->save();
        } else {
            $cart = $cart_model;

            // create order list
            $order_list = new Order_List;

            $order_list->restaurant_id = $menu->restaurant_id;
            $order_list->menu_id = $menu->menu_id;
            $order_list->cart_id = $cart->cart_id;
            $order_list->order_status = OrderStatus::NOT_ORDERED;
            $order_list->quantity = 1;

            $order_list->save();
        }
        
        return redirect()->route('manage-order.index');
    }

    public function checkout()
    {
        # code...
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_List  $order_List
     * @return \Illuminate\Http\Response
     */
    public function show(Order_List $order_List)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_List  $order_List
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_List $order_List)
    {
        //
    }
}
