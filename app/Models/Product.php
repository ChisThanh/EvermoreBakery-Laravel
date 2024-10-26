<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'price_sale',
        'image',
        'stock_quantity',
        'description'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function searchableAs(): string
    {
        return 'product_collections';
    }

    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'name' => (string) $this->name,
            'description' => (string) $this->description,
            'updated_at' => $this->updated_at->timestamp ?? 0,
        ];
    }

}

// php artisan scout:import "App\Models\Product"