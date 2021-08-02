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

use App\BusinessModel\RestaurantBusinessModel;
use App\Table;
class TableManagementController extends Controller
{

	public function restaurantBusinessModel(){
		return new RestaurantBusinessModel();
	}

    public function tableManagement(Request $request){
        $restaurant = Auth()->guard('restaurant')->user();
    	$tables = Table::whereDeletedAt(null)->whereRestaurantId($restaurant->id)->orderBy('id','desc')->get();
        return view('restaurant.table-management',compact('tables'));
    }

    public function tableDetails(Request $request){
    	$table_id  = base64_decode($request->table_id);
    	$table_find = Table::find($table_id);
        return view('restaurant.table-details',compact('table_find'));
    }

    public function createTable(Request $request){
    	if($request->isMethod('GET')){

        	return view('restaurant.create-table');
    	}

    	if($request->isMethod('POST')){
    		$data = $request->all();
    		$restaurant = Auth()->guard('restaurant')->user();
    		$create_table = $this->restaurantBusinessModel()->createTable($data, $restaurant);
    		return redirect(route('restaurant.tableManagement'))->with('success' , 'Table has been created successfully.'); 
    	}
    }

    public function occupiedunoccupied(Request $request){
    	if($request->status == 1){
    		Table::whereId($request->table_id)->update(['is_occupied' => 2]);
    	}else{
    		Table::whereId($request->table_id)->update(['is_occupied' => 1]);
    	}

    	return ['status' => $request->status];
    }
}
