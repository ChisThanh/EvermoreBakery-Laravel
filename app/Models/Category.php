<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        "description"
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
