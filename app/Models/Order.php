<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_email',
        'amount',
        'shipping_cost',
        'status',
        'is_paid',
        'payment_transaction_id',
        'idempotency_key',
    ];
}
