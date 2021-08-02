<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantTiming extends Model
{
    protected $fillable = [
    	'day',
    	'open_time',
    	'close_time',
    	'open_status',
    	'close_status'
    ];
}
