<?php

namespace App\Http\Controllers;

use App\User;
use App\Request;
use App\Notifications\RequestAccess;
use Illuminate\Support\Facades\Notification;


class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('request.index',[
            'request' => Request::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=request()->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'school_name'=>'required',
            'address'=>'required',
            'total_student'=>'required',

        ]);
        Request::create($data);
        $user=User::find(1);
        Notification::send($user,new RequestAccess($data));
        return redirect('/request/create')->with('success','Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('request.show',compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('request.edit',compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        request()->validate([
            //
        ]);
        $request->update([
            //
        ]);
        return redirect('request')->with('message','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->delete();
        return redirect('request')->with('message','Record deleted successfully');
    }
}