<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cuntry;
use File;
use Image;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('frontend.pages.customer.my-profile',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userEdit = User::find($id);
        if( !empty($userEdit)){
            $cuntrys = cuntry::orderby('cuntry','asc')->where('status',1)->get();
            return view('frontend.pages.customer.edit', compact('userEdit','cuntrys'));
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
        $users = User::find($id);
        $users->name        = $request->name;
        $users->phone       = $request->phone;
        $users->address     = $request->address;
        $users->city        = $request->city;
        $users->cuntry      = $request->cuntry;
        $users->zipcode     = $request->zipcode;

        if( $request->profile){

            if( File::exists("backend/img/user/" . $users->image) ){
                File::delete("backend/img/user/" . $users->image);
            }

            $cathcImg = $request->file('profile');
            $imgName = time()."_". $cathcImg->getClientOriginalName();
            $location = public_path("backend/img/user/" . $imgName);
            Image::make($cathcImg)->save($location);
            $users->image = $imgName;
        }

        $users->save();
        return redirect()->route('customer-profile');
    }

   

    
}
