<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ip_address','first_name','last_name','phone','email','address','division_id','district_id','cuntry','message','amount','transaction_id','currency','is_paid','status'];

    // User Class Call
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
