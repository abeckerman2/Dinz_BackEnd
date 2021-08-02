<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);

use Session;
use Artisan;
use Carbon\Carbon;
use DB;
use App\Validation;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Redirect;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Category;
use App\BusinessModel\RestaurantBusinessModel;
use App\Menu;

class MenuManagementController extends Controller
{

	public function restaurantBusinessModel(){
		return new RestaurantBusinessModel();
	}
    public function menuManagement(Request $request){
    	$restaurant = Auth()->guard('restaurant')->user();
    	$menus = Menu::whereDeletedAt(null)->whereRestaurantId($restaurant->id)->orderBy('item_name','asc')->get();
        return view('restaurant.menu-management',compact('menus'));
    }
    

    public function addItem(Request $request){

    	if($request->isMethod('GET')){ 
    		$categories = Category::whereDeletedAt(null)->get();
        	return view('restaurant.add-item',compact('categories'));
    	}

    	if($request->isMethod('POST')){
    		$data = $request->all();
    		$restaurant = Auth()->guard('restaurant')->user();
    		$add_item = $this->restaurantBusinessModel()->addItem($data, $restaurant);
    		return redirect(route('restaurant.menuManagement'))->with('success' , 'Iteam has been added successfully.'); 
    	}
    }

    public function editItem(Request $request){
    	if($request->isMethod('GET')){
    		$menu_id = base64_decode($request->menu_id);
	    	$menu_find = Menu::find($menu_id);
	    	$categories = Category::whereDeletedAt(null)->get();
	        return view('restaurant.edit-item',compact('menu_find','categories'));
    	}

    	if($request->isMethod('POST')){
    		$data = $request->all();
    		$menu_id = base64_decode($request->menu_id);
    		$menu_find = Menu::find($menu_id);
    		$edit_item = $this->restaurantBusinessModel()->updateItem($data, $menu_find);
    		return redirect(route('restaurant.menuManagement'))->with('success' , 'Iteam has been updated successfully.'); 
    	}
    }

    public function availUnavail(Request $request){

    	if($request->status == 1){
    		Menu::whereId($request->menu_id)->update(['is_available' => 2]);
    	}else{
    		Menu::whereId($request->menu_id)->update(['is_available' => 1]);
    	}

    	return ['status' => $request->status];
    }

    public function deleteItem(Request $request){
        $menu_id = $request->delete_item_id;
        Menu::whereId($menu_id)->update(['deleted_at' => Carbon::now()]);
        return redirect(route('restaurant.menuManagement'))->with('success' , 'Iteam has been deleted successfully.'); 
    }

}
