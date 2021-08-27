<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItems;
use App\Payment;
use App\Restaurant;


class Order extends Model
{
    protected $fillable = [
        'user_id',
    	'restaurant_id',
    	'table_id',
        'date',
    	'date_time',
    	'order_status',
    	'order_type',
    	'order_text_customization',
    	'sent_payment_type',
    	'discount_percentage',
    	'discount_amount',
    	'tax_percentage',
    	'tax_amount',
    	'tip_amount',

        'description',

    	'total_amount',
        'address',
        'lat',
        'lon',
        'country_code',
        'phone_number',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function orderItemsWithMenu(){
        return $this->hasMany(OrderItem::class)->with('menu');
    }

    public function table(){
        return $this->belongsTO(Table::class);
    }

    public function user(){
        return $this->belongsTO(User::class);
    }

    public function payment(){
        return $this->hasone(Payment::class);
    }

    public function restaurant(){
        return $this->belongsTO(Restaurant::class);
    }

}
