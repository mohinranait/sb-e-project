<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cuntry;

class cuntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuntrys = cuntry::orderby('cuntry','asc')->get();
        return view('backend.pages.cuntry.manage' , compact('cuntrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.cuntry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuntrys = new cuntry();
        $cuntrys->cuntry = $request->cuntry;
        $cuntrys->status = $request->status;

        $cuntrys->save();
        return redirect()->route('cuntry.index')->with('success',' Create Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuntrys = cuntry::find($id);
        if( !empty($cuntrys)){
             return view('backend.pages.cuntry.edit',compact('cuntrys'));
        }
       
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
        $cuntrys = cuntry::find($id);
        $cuntrys->cuntry = $request->cuntry;
        $cuntrys->status = $request->status;

        $cuntrys->save();
        return redirect()->route('cuntry.index')->with('success',' Update Successfull');
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
