<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{

    protected $fillable = [
    	'restaurant_id',
    	'restaurant_image'
    ];


    public function getRestaurantImageAttribute($value){

        if(!empty($value)){

            $path_img = public_path(). '/storage/restaurant/restaurant_images' . '/' . $value;

            if(file_exists($path_img)){
                return url('/') . '/' . env('RESTAURANT_IMAGES_VIEW') . '/' . $value;
            }else{

                return "";
            } 
        }else{
            return $value;
        }
    }
    
}
