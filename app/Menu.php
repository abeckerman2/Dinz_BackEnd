<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Menu extends Model
{
    protected $fillable = [
        'parent_menu_id',
    	'restaurant_id',
    	'category_id',
    	'category_name',
    	'image',
    	'item_name',
    	'item_type',
    	'price',
    	'description',
    	'is_available'
    ];



    public function getImageAttribute($value){

        if(!empty($value)){

            $path_img = public_path(). '/storage/restaurant/menu_images' . '/' . $value;

            if(file_exists($path_img)){
                return url('/') . '/' . env('MENU_IMAGES_VIEW') . '/' . $value;
            }else{

                return url("/"). "/public/restaurant/assets/img/foodImage.jpg";
            } 
        }else{
            return $value;
        }
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
