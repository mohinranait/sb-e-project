<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'sortDiscription',
        'brand_id',
        'category_id',
        'quentity',
        'regular_price',
        'description',
        'offer_price',
        'is_fiture',
        'status',
        'tags',
    ];


    /**
     * Get the Brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(BrandModel::class);
    }

    // get the Category owns the Product 
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // get the Images owns the Product 
    public function images(){
        return $this->hasMany(productImage::class);
    }
}
