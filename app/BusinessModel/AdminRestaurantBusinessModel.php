<?php

namespace App\BusinessModel;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\RestaurantImage;
use App\RestaurantTiming;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Menu;
use Carbon\Carbon;
use App\Category;
use App\Table;
use App\Mail\BlockRestaurantMail;

class AdminRestaurantBusinessModel extends Model
{
    public function restaurantManagement($request){
        $restaurants = Restaurant::whereDeletedAt(null)->whereIsApproved(0)->orderBy('id','desc')->get();
        return $restaurants;      
    }

    public function requestRestaurantDetails($request,$restaurant_id){
        $restaurant_id = base64_decode($restaurant_id);
        $request_restaurant_detail = Restaurant::whereId($restaurant_id)->first();
        return $request_restaurant_detail;
    }

    public function approvedRestaurant($request){
        $approved_restaurants = Restaurant::whereDeletedAt(null)->whereIsApproved(1)->orderBy('id','desc')->get();
        return $approved_restaurants;      
    }

    public function editRestaurant($request,$restaurant_id){

        $restaurant_id = base64_decode($restaurant_id);
        $restaurant_find = Restaurant::whereId($restaurant_id)->first();
        return $restaurant_find;
    }

    public function updateRestaurant($data,$restaurant_id,$where){

        
        $restaurant_find = Restaurant::where($where)->first();
        
        
        $restaurant_find->fill($data);
        $isUpdated = $restaurant_find->update();
        if(!empty($isUpdated)){

            return ['status' => "1", 'success' => "Restaurant details has been updated successfully."];
            
        }else{

            return ['status' => "2", 'error' => "Unable to updated restaurant."];

        }      
    }

    public function blockRestaurant($request){
        $restaurant_block = Restaurant::whereId($request->restaurant_block_id)->first();
        
        $text_message = $request->text_message;

        try{
            \Mail::to($restaurant_block->email)->send(new BlockRestaurantMail($restaurant_block,$text_message));
        }catch(\Exception $ex){
            return ['status' => "2", 'error' => "something went wrong."];
        }

        $restaurant_block->is_block = 1;
        $blockRestaurant = $restaurant_block->update();

        if(!empty($blockRestaurant)){
            return ['status' => "1", 'success' => "Restaurant has been blocked successfully."];          
        }else{
            return ['status' => "2", 'error' => "Unable to block restaurant."];   
        }
    }

    public function restaurantUnblock($request,$restaurant_id){
        $restaurant_id = base64_decode($request->restaurant_id);
        $restaurant_unblock = Restaurant::whereId($restaurant_id)->first();
        $restaurant_unblock->is_block = 0;
        $restaurantUnblock = $restaurant_unblock->update();

        if(!empty($restaurantUnblock)){
            return ['status' => "1", 'success' => "Restaurant has been unblocked successfully."];          
        }else{
            return ['status' => "2", 'error' => "Unable to unblocked."];   
        }

    }

    public function deleteApprovedRestaurant($request){

        $restaurant_id = $request->class_id;
        $restaurant_delete = Restaurant::whereId($restaurant_id)->first();
        $restaurant_delete->deleted_at = Carbon::now();
        $deleteRestaurant = $restaurant_delete->update();

        if(!empty($deleteRestaurant)){
            return ['status' => "1", 'success' => "Restaurant has been deleted successfully."];          
        }else{
            return ['status' => "2", 'error' => "Unable to delete restaurant."];   
        }

    }


    public function rejectedRestaurant($request){
        $rejected_restaurants = Restaurant::whereDeletedAt(null)->whereIsApproved(2)->orderBy('id','desc')->get();
        return $rejected_restaurants;      
    }

    public function rejectedRestaurantDetails($request,$restaurant_id){
        $restaurant_id = base64_decode($restaurant_id);
        $reject_restaurant_detail = Restaurant::whereId($restaurant_id)->first();
        return $reject_restaurant_detail;
    }

    public function addImages(array $data){
        return RestaurantImage::create($data);
    }
}