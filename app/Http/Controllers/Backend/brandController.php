<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class brandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = BrandModel::orderby('name', 'asc')->get();
        return view('backend.pages.brand.manage' , compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brandObj = new BrandModel();
        $brandObj->name     = $request->name;
        $brandObj->slug     = Str::slug($request->name);
        $brandObj->status   = $request->status;

        // Brand iamge code 
        if( $request->image ){
            $cachImage = $request->file('image');
            $ImageName = time() . "." . $cachImage->getClientOriginalExtension();
            $location = public_path('backend/img/brands/' . $ImageName);
            Image::make($cachImage)->save($location);
            $brandObj->image = $ImageName ;
        }

        $brandObj->save();
        return redirect()->route('brand.index')->with('success',' Create Successfull');
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
        $brand = BrandModel::find($id);
        if( !is_null($brand)){
            return view('backend.pages.brand.edit' , compact('brand'));
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
        $brandObj = BrandModel::find($id);
        $brandObj->name     = $request->name;
        $brandObj->slug     = Str::slug($request->name);
        $brandObj->status   = $request->status;

        // Brand iamge code 
        if( $request->image ){

            if( File::exists('backend/img/brands/' . $brandObj->image)){
                File::delete('backend/img/brands/' . $brandObj->image);
            };

            $cachImage = $request->file('image');
            $ImageName = time() . "." . $cachImage->getClientOriginalExtension();
            $location = public_path('backend/img/brands/' . $ImageName);
            Image::make($cachImage)->save($location);
            $brandObj->image = $ImageName ;
        };

        $brandObj->save();
        return redirect()->route('brand.index')->with('success',' Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = BrandModel::find($id);

        if( !is_null( $brand )){

            if( File::exists('backend/img/brands/' . $brand->image)){
                File::delete('backend/img/brands/' . $brand->image);
            };

            $brand->delete();

            return redirect()->route('brand.index');
        }
    }
}
