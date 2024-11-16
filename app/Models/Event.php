<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use CrudTrait;
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
    ];
}
