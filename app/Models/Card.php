<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','product_qty','order_id','user_id','ip_address'];

    // Product Class Call
    public function products()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }

    // User Class Call
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // User Class Call
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }


    public static function totalPrice ()
    {
        if(Auth::check()){
            $cards = Card::where('user_id', Auth::id())->where('order_id', NULL)->get();
        }else{
            $cards = Card::where('ip_address', request()->ip() )->where('order_id', NULL)->get();
        }

        $totalPriceVariable = 0;
        foreach($cards as $card){
            if( !empty( $card->products->offer_price)){
                $totalPriceVariable += $card->products->offer_price * $card->product_qty;
            }else{
                $totalPriceVariable += $card->products->regular_price * $card->product_qty;
            }
        }
        return $totalPriceVariable;
    }

    // total Items count
    public static function totalItem()
    {
        if( Auth::check()){
            $cards = Card::where('user_id',Auth::id())->where('order_id',NULL)->get();
        }else{
            $cards = Card::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }

        $totalCoutn = 0;
        foreach($cards as $card){
            $totalCoutn += $card->product_qty;
        }

        return $totalCoutn;

    }

}
