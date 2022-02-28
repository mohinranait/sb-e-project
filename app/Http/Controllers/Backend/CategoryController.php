<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categorys = Category::orderby('title' , 'asc')->where('is_parent' , 0)->get();
        return view('backend.pages.category.manage', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::orderby('title' , 'asc')->where('is_parent' , 0)->get();
        return view('backend.pages.category.create' , compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category  = new Category();
        $category->title        = $request->name;
        $category->slug         = Str::slug($request->name);
        $category->dis          = $request->dis;
        $category->is_parent    = $request->is_parent;
        $category->status       = $request->status;

        if( $request->image ){
            $cashImage = $request->file('image');
            $imageName = time() . ".". $cashImage->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $imageName);
            Image::make($cashImage)->save($location);
            $category->image = $imageName;
        }
        $category->save();
        return redirect()->route('category.index')->with('success',' Create Successfull');
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
        $category = Category::find($id);

        if( !is_null($category) ){
            $parents = Category::orderby('title' , 'asc')->where('is_parent', 0)->get();
            return view('backend.pages.category.edit' , compact( 'parents' , 'category'));
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
        $category  = Category::find($id);
        $category->title        = $request->name;
        $category->slug         = Str::slug($request->name);
        $category->dis          = $request->dis;
        $category->is_parent    = $request->is_parent;
        $category->status       = $request->status;

        if( $request->image ){

            if( File::exists('backend/img/category/' . $category->image) ){
                File::delete('backend/img/category/' . $category->image);
            }

            $cashImage = $request->file('image');
            $imageName = time() . ".". $cashImage->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $imageName);
            Image::make($cashImage)->save($location);
            $category->image = $imageName;
        }
        $category->save();
        return redirect()->route('category.index')->with('success',' Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if( !is_null($category) ){
            if( File::exists('backend/img/category/' . $category->image) ){
                File::delete('backend/img/category/' . $category->image);
            }
            $category->delete();
            return redirect()->route('category.index');
        }
    }
}
