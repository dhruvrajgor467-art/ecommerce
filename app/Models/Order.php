<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [

        'user_id',
        'customer_name',
        'email',
        'phone',
        'address',
        'total',
        'status'

    ];

    /*
    |-----------------------------------------
    | Relationships
    |-----------------------------------------
    */

    // One order has many items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Order belongs to user (customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |-----------------------------------------
    | Optional (Recommended)
    |-----------------------------------------
    */

    protected $casts = [
        'total' => 'decimal:2',
    ];
}