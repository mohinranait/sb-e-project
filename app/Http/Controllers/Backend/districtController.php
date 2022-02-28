<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class districtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $districts = District::orderby('name' , 'asc')->get();
        return view('backend.pages.district.manage' , compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = division::orderby('name' , 'asc')->get();
        return view('backend.pages.district.create' , compact('divisions') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $district = new District();
        $district->name         = $request->dname;
        $district->slug         = str::slug($request->slug);
        $district->division_id	= $request->divisinis;
        $district->status       = $request->status;

        $district->save();
        return redirect()->route('district.index')->with('success',' Create Successfull');
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
        $edit = District::find($id);
        if( !is_null($edit) ){
            $divisions = division::orderby('name' , 'asc')->get();
            return view('backend.pages.district.edit' , compact('edit' , 'divisions'));
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
        $update = District::find($id);
        $update->name           = $request->dname;
        $update->slug           = str::slug($request->slug);
        $update->division_id    = $request->divisinis;
        $update->status         = $request->status;

        $update->save();
        return redirect()->route('district.index')->with('success',' Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = District::find($id);
        if( !is_null($delete)){
            $delete->delete();
        }

        return redirect()->route('district.index');
    }
}
