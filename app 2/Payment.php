<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
    	'restaurant_id',
    	'order_id',
    	'payment_date_time',
    	'discount_percentage',
    	'discount_amount',
    	'tax_percentage',
    	'tax_amount',
    	'tip_amount',
    	'total_amount',
        'transaction_id'

    ];
}
