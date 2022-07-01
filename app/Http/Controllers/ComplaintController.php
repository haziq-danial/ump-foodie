<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ComplaintStatus;
use App\Models\Complaint_list;
use App\Models\Complaints;
use App\Models\Delivery_list;
use App\Models\Order_list;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function riderView()
    {
        $rider = session('user');

        $complaints = Complaint_list::with(['delivery', 'customer'])
                                        ->where('rider_id', $rider['rider_id'])
                                        ->get();

        return view('ManageComplaints.rider-view', [
            'complaints' => $complaints,
            'count' => 1
        ]);
    }
    
    public function view($delivery_list_id)
    {
        $delivery = Delivery_list::with(['order', 'rider', 'complaints'])->find($delivery_list_id);

        return view('ManageComplaints.view',[
            'delivery' => $delivery
        ]);
    }

    public function create($delivery_list_id)
    {
        return view('ManageComplaints.create', [
            'delivery_list_id' => $delivery_list_id
        ]);
    }

    public function edit($delivery_list_id)
    {
        $complaint = Complaint_list::with('delivery')->find($delivery_list_id);
    }

    public function update(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $cust = session('user');

        $delivery = Delivery_list::with(['order', 'rider'])
                                    ->find($request->delivery_list_id);
        $complaint = new Complaint_list;
        $complaint->delivery_list_id = $request->delivery_list_id;
        $complaint->cust_id = $cust['cust_id'];
        $complaint->rider_id = $delivery->rider->rider_id;
        $complaint->description = $request->description;
        $complaint->type = $request->type;
        $complaint->status = ComplaintStatus::IN_INVESTIGATION;

        $complaint->save();

        return redirect()->route('manage-complaint.view', $request->delivery_list_id);
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
