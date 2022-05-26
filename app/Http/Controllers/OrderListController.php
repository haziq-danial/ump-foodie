<?php

namespace App\Http\Controllers;

use App\Models\Order_List;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function index()
    {
        return view('ManageOrder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_List  $order_List
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_List $order_List)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_List  $order_List
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_List $order_List)
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
