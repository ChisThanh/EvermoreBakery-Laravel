<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'coupon_id',
        'user_id',
        'name',
        'used_at',
        'status',
    ];

}
