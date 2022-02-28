<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Product;
use App\Models\cuntry;
use App\Models\productImage;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;
use Auth;

class pageController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $products = Product::orderby('name','asc')->where('status',1)->get();
        return view('frontend.pages.home' ,compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $products = Product::orderby('name','asc')->where('status',1)->get();
        return view('frontend.pages.shop',compact('products'));
    }

    // offer Products page
    public function offerProduct()
    {
        $products = Product::orderby('name','asc')->where('is_fiture',1)->where('status',1)->get();
        return view('frontend.pages.on-sell',compact('products'));
    }
    

    // Primary Category wish product display
    public function primaryCategory_wish_product($slug)
    {
        $categorys = Category::where('slug',$slug)->first();
        if( !empty($categorys)){
            $products = Product::orderby('name','asc')->where('status',1)->get();
            return view('frontend.pages.primary-category-wish',compact('products','categorys'));
        }else{
            return redirect()->back();
        }
    }

    // sub Category wish product display
    public function subCategory_wish_product($slug)
    {
        $categorys = Category::where('slug',$slug)->first();
        if( !empty($categorys)){
            $products = Product::orderby('name','asc')->where('status',1)->get();
            return view('frontend.pages.sub-category-wish',compact('products','categorys'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display a listing of the search Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchResult = $request->search;
        $products = Product::orWhere('name' , 'like' , '%' . $searchResult . '%')->orWhere('sortDiscription','like', '%'. $searchResult .'%')->orWhere('tags','like','%'. $searchResult . '%')->orderby('id','desc')->get();
        return view('frontend.pages.search',compact('products','searchResult'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $cards = Card::all();
        $districts = District::orderby('name','asc')->where('status',1)->get();
        $divisions = Division::orderby('name','asc')->where('status',1)->get();
        $cuntrys = cuntry::orderby('cuntry','asc')->where('status',1)->get();
        return view('frontend.pages.checkout',compact('cards','districts','divisions','cuntrys'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function card()
    {
        return view('frontend.pages.card');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if( Auth::check()){
            return redirect()->back();
        }else{
            return view('frontend.pages.customer-login');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productdetails($slug)
    {
        $products = Product::where('slug',$slug)->first();
        if( !empty($products)){
            $categorys = $products->category_id;
            $productsRel = Product::where('category_id', $categorys)->where('status',1)->latest()->get();
            return view('frontend.pages.product-details',compact('products','productsRel'));
        }else{
            return redirect()->back();
        }
        
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
