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

    const PAYMENT_COD='cod';
    const PAYMENT_STRIPE='stripe';
    const PAYMENT_RAZORPAY='razorpay';
    const PAYMENT_PAYPAL='paypal';

    const PAYMENT_PENDING='pending';
    const PAYMENT_PAID='paid';
    const PAYMENT_FAILED='failed';

    protected $fillable = [

        'user_id',
        'customer_name',
        'email',
        'phone',
        'address',
        'total',
        'status',

        'payment_method',
        'payment_status',
        'transaction_id'

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