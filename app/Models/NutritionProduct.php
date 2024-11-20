<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionProduct extends Model
{
    use HasFactory;
    protected $table = 'nutrition_product';
    protected $fillable = [
        'nutrition_id',
        'product_id',
    ];
}
