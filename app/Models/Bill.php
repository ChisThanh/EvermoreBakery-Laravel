<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use CrudTrait;
    use HasFactory;

    public const STATUS_PENDING = 1;
    public const STATUS_PROCESSING = 2;
    public const STATUS_DELIVERY = 3;
    public const STATUS_COMPLETED = 4;
    public const STATUS_CANCEL = 5;

    public const PAYMENT_METHOD_CASH = 1;
    public const PAYMENT_METHOD_CARD = 2;

    public const PAYMENT_PAID = 1;
    public const PAYMENT_UNPAID = 2;

    protected $fillable = [
        'user_id',
        'delivery_date',
        'total',
        'payment_status',
        'payment_method',
        'status',
        'note',
        'coupon_id',
    ];

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details()
    {
        return $this->hasMany(BillDetail::class, 'bill_id');
    }

    public function address()
    {
        return $this->hasOne(BillAddress::class, 'bill_id');
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
}
