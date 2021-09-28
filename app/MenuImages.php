<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuImages extends Model
{
    protected $fillable = [
    	'restaurant_id',
    	'menu_image',
    	'deleted_at',
    ];
}
