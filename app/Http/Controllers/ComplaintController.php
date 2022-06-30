<?php

namespace App\Http\Controllers;

use App\Models\Complaint_list;
use App\Models\Complaints;
use App\Models\Delivery_list;
use App\Models\Order_list;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    
    public function view($delivery_list_id)
    {
        $delivery = Delivery_list::find($delivery_list_id);


        return view('ManageComplaints.view',[
            'delivery' => $delivery
        ]);
    }

    public function create()
    {
        return view('ManageComplaints.create');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
