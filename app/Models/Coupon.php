<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'code',
        'title',
        'description',
        'discount_amount',
        'discount_percentage',
        'expires_at',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
