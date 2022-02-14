<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;
use App\Models\Order;
use Auth;

class cardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardProduct = Card::orderby('id','asc')->get(); 
        return view('frontend.pages.card',compact('cardProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Auth::check()){
            $card = Card::where('user_id',Auth::id())->where('product_id',$request->productid)->first();
        }else{
            $card = Card::where('ip_address',request()->ip() )->where('product_id',$request->productid)->first();
        }

        
        if( !empty($card) ){
            $card->increment('product_qty');
            return redirect()->back();
        }else{
            $card = new Card();
            if( Auth::check() ){
                $card->user_id = Auth::id();
            }
            $card->ip_address = $request->ip();
            $card->product_id = $request->productid;
            $card->save();
            return redirect()->back();
        }
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
        $update = Card::find($id);
        if( !empty( $update)){
            $update->product_qty = $request->quantity;
            $update->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Card::find($id);
        if( !empty($delete)){
            $delete->delete();
        }
        return redirect()->back();
    }
}
