<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';
    protected $fillable = ['table_id', 'food_item', 'quantity', 'total_amount', 'payment_method', 'checkout_time'];
}
