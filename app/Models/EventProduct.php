<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventProduct extends Model
{
    use HasFactory;
    protected $table = 'event_products';
    protected $fillable = [
        'event_id',
        'product_id',
    ];
}
