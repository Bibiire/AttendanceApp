<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialRequest;
use App\Models\Center;
use Carbon\Carbon;



class SpecialRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::all();
        return view('specialRequest', compact('centers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'phoneNo' => 'required',
        'maritalStatus' => 'required',
        'address' => 'required',
        'email' => 'required',
        'center_id' => 'required',
        'attendance' => 'required',
        'prevApply' => 'required',
        'finCounsel' => 'required',
        'finSituation' => 'required',
        'totalSum' => 'required',
        'need' => 'required',
        // 'pastorComment' => 'required',
        'employmentStatus' => 'required',
        'RequestDetails' => 'required'
        ]);

        $specialRequest = SpecialRequest::create([
            'fname' =>  $request->fname,
            'lname' =>  $request->lname,
            'dob' =>  $request->dob,
            'gender' =>  $request->gender,
            'phoneNo' =>  $request->phoneNo,
            'maritalStatus' =>  $request->maritalStatus,
            'address' =>  $request->address,
            'email' => $request->email,
            'center_id' =>  $request->center_id,
            'attendance' =>  $request->attendance,
            'prevApply' =>  $request->prevApply,
            'finCounsel' =>  $request->finCounsel,
            'finSituation' =>  $request->finSituation,
            'totalSum' =>  $request->totalSum,
            'need' =>  $request->need,
            'pastorComment' =>  $request->pastorComment,
            'employmentStatus' =>  $request->employmentStatus,
            'RequestDetails' =>  $request->RequestDetails,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('error','Request has been submitted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialRequest = SpecialRequest::find($id);
        return view('team_lead.specRequest', compact('specialRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
