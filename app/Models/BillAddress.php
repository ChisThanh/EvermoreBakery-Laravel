<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillAddress extends Model
{
    use HasFactory;
    protected $table = 'bill_address';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'phone',
        'city',
        'district',
        'ward',
        'street',
    ];

    public function getStringAddressAttribute(): string
    {
        return "{$this->name} - {$this->phone} - {$this->street}, {$this->ward}, {$this->district}, {$this->city}";
    }
}
