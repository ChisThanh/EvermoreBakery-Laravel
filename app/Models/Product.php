<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use CrudTrait, HasFactory, SoftDeletes, Searchable, Sluggable;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'price_sale',
        'description'
    ];

    public function sluggable(): array
    {
        return ['slug' => ['source' => 'name']];
    }

    public function searchableAs(): string
    {
        return 'product_collections';
    }

    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'name' => strtolower($this->name),
            'description' => strtolower($this->description),
            'category' => strtolower($this->category->name),
            'price' => (float) $this->price_sale,
            'updated_at' => $this->updated_at->timestamp ?? 0,
        ];
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_products')
            ->withPivot('percentage');
    }

    public function latestEvent()
    {
        return $this->belongsToMany(Event::class, 'event_products')
            ->withPivot(['percentage', 'created_at'])
            ->where('events.start_date', '<=', now())
            ->where('events.end_date', '>=', now())
            ->orderBy('event_products.created_at', 'desc')
            ->limit(1);
    }

    public function likes()
    {
        return $this->belongsToMany(
            User::class,
            'likes',
            'product_id',
            'user_id'
        );
    }

    public function ingredients()
    {
        return $this->belongsToMany(
            Ingredient::class,
            'ingredient_product',
            'product_id',
            'ingredient_id'
        );
    }

    public function nutrition()
    {
        return $this->belongsToMany(
            Nutrition::class,
            'nutrition_product',
            'product_id',
            'nutrition_id'
        );
    }
}

// php artisan scout:import "App\Models\Product"