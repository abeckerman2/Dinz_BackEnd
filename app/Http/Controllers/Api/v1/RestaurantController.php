<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Restaurant;
use App\Menu;
use App\Http\Controllers\Api\v1\ResponseController;

class RestaurantController extends ResponseController
{
    

    public function restaurantList(Request $request){
    	if($request->search){

    		$data = Restaurant::where('restaurant_name', 'like', '%'. $request->search . '%')->orderBy('id' , 'desc')->with('restaurantImages','restaurantTimings')->paginate(10);
    	}else{
    		$data = Restaurant::orderBy('id' , 'desc')->with('restaurantImages','restaurantTimings')->paginate(10);
    	}

        return $this->responseOk("Restaurant Listing", $data);
    }

    public function restaurantDetails(Request $request, $id){
    	$restaurant_id = $request->id;
    	$restaurant_find = Restaurant::whereId($restaurant_id)->with('restaurantImages','restaurantTimings')->first();
        return $this->responseOk("Restaurant Details", $restaurant_find);
    }

    public function menuListing(Request $request){
        $restaurant_id = base64_decode($request->restaurant_id);
        $table_id = $request->table_id;
        $menus = Menu::whereDeletedAt(null)->whereRestaurantId($restaurant_id)->with('category')->paginate(25);
        return $this->responseOk('Menu Listing', $menus);
    }
    

}
