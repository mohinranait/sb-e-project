<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Product;
use App\Models\productImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;


class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('name', 'asc')->get();
        return view('backend.pages.product.manage' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = BrandModel::orderby('name', 'asc')->get();
        $categorys = Category::orderby('title' , 'asc')->where('is_parent' , '0')->get();
        return view("backend.pages.product.create" , compact('brands' , 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->name             = $request->productname;
        $products->slug             = Str::slug($request->productname);
        $products->sortDiscription  = $request->sortDis;
        $products->brand_id         = $request->brand;
        $products->category_id      = $request->category;
        $products->quentity         = $request->quentity;
        $products->regular_price    = $request->regularPrice;
        $products->Description      = $request->discrip;
        $products->offer_price      = $request->offerPrice;
        $products->is_fiture        = $request->fitureProduct;
        $products->status           = $request->status;
        $products->tags             = $request->tags;
        $products->save();


        if( count($request->p_image) > 0  ){
            foreach( $request->p_image as $image ){

                $imgName = rand(1,999999) . "." . $image->getClientOriginalExtension();
                $location = public_path("backend/img/product/" . $imgName);
                Image::make($image)->save($location);

                $p_image = new productImage();
                $p_image->product_id = $products->id;
                $p_image->image      = $imgName;
                $p_image->save();
                
                
            }
        }

        return redirect()->route("product.index");
   
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
        $products = Product::find($id);
        if( !is_null($products)){

            $brands = BrandModel::orderby('name', 'asc')->get();
            $categorys = Category::orderby('title' , 'asc')->where('is_parent' , '0')->get();
            return view( "backend.pages.product.edit" , compact('brands' , 'categorys' , 'products'));
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
        $update = Product::find($id);
        $update->name             = $request->productname;
        $update->slug             = Str::slug($request->productname);
        $update->sortDiscription  = $request->sortDis;
        $update->brand_id         = $request->brand;
        $update->category_id      = $request->category;
        $update->quentity         = $request->quentity;
        $update->regular_price    = $request->regularPrice;
        $update->Description      = $request->discrip;
        $update->offer_price      = $request->offerPrice;
        $update->is_fiture        = $request->fitureProduct;
        $update->status           = $request->status;
        $update->tags             = $request->tags;

        $update->save();

       
        
        if( count($request->p_image) > 0  ){


            foreach( $update->images as $pimage){

                if( File::exists('backend/img/product/' . $pimage->image)){
                    File::delete('backend/img/product/' . $pimage->image);
                };
            }


            foreach( $request->p_image as $image ){

                $imgName = rand(1,999999) . "." . $image->getClientOriginalExtension();
                $location = public_path("backend/img/product/" . $imgName);
                Image::make($image)->save($location);

                $p_image = new productImage();
                $p_image->product_id = $update->id;
                $p_image->image      = $imgName;
                $p_image->save();
                
            }
        }

        return redirect()->route("product.index");

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
