<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'division_id',
        'status',
    ];


    /**
     * Get the post that owns the comment.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
