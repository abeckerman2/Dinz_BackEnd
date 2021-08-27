<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantImages extends Model
{

    protected $fillable = [
    	'restaurant_id',
    	'restaurant_images'
    ];
    
}
