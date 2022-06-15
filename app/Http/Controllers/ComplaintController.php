<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    
    public function index()
    {
        return view('ManageComplaints.index');
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
     * Display the specified resource.
     *
     * @param  \App\Models\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function show(Complaints $complaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaints $complaints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaints $complaints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaints $complaints)
    {
        //
    }
}
