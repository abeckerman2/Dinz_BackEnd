<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\RestaurantImage;
use App\RestaurantTiming;
class Restaurant extends Authenticatable
{
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'restaurant_name',
        'owner_name',
    	'restaurant_logo',
    	'restaurant_address',
        'city',
        'lat',
        'lon',
    	'email',
        'country_code',
    	'phone_number',
    	'password',
        'is_approved',
        'qr_code',
        'description'
    ];
        

    protected $hidden = [
        'password',
    ];


    public function getRestaurantLogoAttribute($value){
        $path = url('public/storage/restaurant/restaurant_logo');

        if($value){
            $image = $path.'/'.$value;
            return $image;
        }else{
            $value;
        }
    }

    public function getQrCodeAttribute($value){

        if(!empty($value)){

            $path_img = public_path(). '/storage/restaurant/qr_code' . '/' . $value;

            if(file_exists($path_img)){
                return url('/') . '/' . env('QR_CODE_VIEW') . '/' . $value;
            }else{

                return "";
            } 
        }else{
            return $value;
        }
    }

    public function restaurantImages(){
        return $this->hasMany(RestaurantImage::class);
    }
    public function restaurantTimings(){
        return $this->hasMany(RestaurantTiming::class);
    }

}   
