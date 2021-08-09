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
use App\Order;
use Validator;

use App\RestaurantDocs;
use App\ParentMenuName;


class TableManagementController extends Controller
{

	public function restaurantBusinessModel(){
		return new RestaurantBusinessModel();
	}

    public function tableManagement(Request $request){
        $restaurant = Auth()->guard('restaurant')->user();
    	$tables = Table::whereDeletedAt(null)->whereRestaurantId($restaurant->id)->with('activeOrders')->orderBy('id','desc')->get();
        return view('restaurant.table-management',compact('tables'));
    }

    public function tableDetails(Request $request){

        if($request->isMethod('GET')){

            $restaurant_id = Auth::guard('restaurant')->user()->id;

        	$table_id  = base64_decode($request->table_id);
        	// return $table_find = Table::find($table_id)->with('activeOrders');
            $table_find = Table::where('id' , $table_id)->with('activeOrdersWithOrderItem')->first();


            if($table_find->assign_document_id != ""){
                $document_details = RestaurantDocs::where('id' , $table_find->assign_document_id)->first();
            }else{
                $document_details = "";
            }

            $table_description = Table::where('id' , $table_id)->with('requestWaiter')->first();

            $main_menu_name = ParentMenuName::where('deleted_at' , null)->where('restaurant_id' , $restaurant_id)->orderBy('id' , 'desc')->get();
            $documents = RestaurantDocs::where('restaurant_id' , $restaurant_id)->where('deleted_at' , null)->orderBy('id' , 'desc')->get();


            Session::put('table_id', $table_id);

            return view('restaurant.table-details',compact('table_find' , 'document_details' , 'table_id' , 'table_description' , 'main_menu_name' , 'documents'));
        }
        if($request->isMethod('POST')){
            $table_id = Session::get('table_id');

            $data = [
                "assign_menu_id" => $request->menu_id,
                'assign_document_id' => $request->document_id,
            ];
            Table::where('id' , $table_id)->update($data);
            return back()->with('success' , 'Table has been updated successfully.');
        }
    }

    public function createTable(Request $request){
    	if($request->isMethod('GET')){

        	return view('restaurant.create-table');
    	}

    	if($request->isMethod('POST')){

            $message = [
                'table_name.required'             => 'Please enter table name.',
                'table_name.unique'               => 'Table name already exist.',
            ];

            $validator = Validator::make($request->all(), [
                'table_name'    =>  'required',
                
            ],$message);

            if($validator->fails()) {
                return back()->with(["errors" => $validator->errors()],400);
            }


            $restaurant_id = Auth()->guard('restaurant')->user()->id;

            $check_table_name_exist = Table::where('table_name' , $request->table_name)->where('restaurant_id' , $restaurant_id)->where('deleted_at' , NULL)->first();
            if($check_table_name_exist){
                return back()->with('error',"Table name already exist.");
            }

    		$data = $request->all();
    		$restaurant = Auth()->guard('restaurant')->user();
            $table_count = Table::whereRestaurantId($restaurant->id)->whereDeletedAt(null)->count();
            if($table_count >= 10){
                return back()->with('error',"You can't add more than 10 tables.");
            }
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

    public function editTable(Request $request , $id){

        $table_id = base64_encode(Session::get('table_id'));

        // return $id;
        // $id = base64_decode($id);
        if($request->isMethod('GET')){
            $data = Table::where('id' , $id)->with('activeOrders')->first();
            return view("restaurant/edit_table" , compact('data' , 'table_id'));
        }
        if($request->isMethod('POST')){


            $message = [
                'table_name.required'             => 'Please enter table name.',
            ];

            $validator = Validator::make($request->all(), [
                'table_name'    =>  'required',
                
            ],$message);

            if($validator->fails()) {
                return back()->with(["errors" => $validator->errors()],400);
            }

            $restaurant_id = Auth::guard('restaurant')->user()->id;

            $check_table_name_exist = Table::where('table_name' , $request->table_name)->where('id' , '!=' ,base64_decode($table_id))->where('restaurant_id' , $restaurant_id)->where('deleted_at' , NULL)->first();
            if($check_table_name_exist){
                return back()->with('error',"Table name already exist.");
            }



            $data = [
                'table_name' => $request->table_name,
                'is_occupied' => $request->is_occupied,
            ];
            
            $is_vacant = $request->is_occupied == 1;
            if($is_vacant){
                Order::where('table_id' , base64_decode($table_id))->where('order_type' , 'server_waiter')->delete();
            }

            $is_updated = Table::where('id' , $id)->update($data);
            if($is_updated){
                return redirect('restaurant/table-management')->with('success' , 'Table details has been updated successfully.');
            }else{
                return back()->with('error' , 'Unable to update table.');
            }
        }
    }

    public function checkBookTable(Request $request){
        $restaurant = Auth()->guard('restaurant')->user();
        $tables = Table::whereRestaurantId($restaurant->id)->whereDeletedAt(null)->with('activeOrders','serverWaiters')->get();
        return json_encode($tables);
    }


    public function tableOrderDetails(Request $request , $id){
        $table_id = base64_encode(Session::get('table_id'));
        $order_details = Order::where('id' , $id)->with('orderItemsWithMenu' , 'user' , 'payment')->first();
        return view('restaurant/table_orders_details' , compact('order_details' , 'table_id'));
    }


    public function deleteTable(Request $request){
        $table_id = $request->delete_table_id;

        $table_detail = Table::where('id' , $table_id)->first();

        if($table_detail->is_occupied == "2"){
            return back()->with('error' , 'Unable to delete table because active orders is running on this table.');
        }
        else{
            Table::whereId($table_id)->update(['deleted_at' => Carbon::now()]);
            return redirect(route('restaurant.tableManagement'))->with('success' , 'Table has been deleted successfully.'); 
        }
    }




    public function changeStatusToPreparing(Request $request){
        Order::whereId($request->order_id)->update(['order_status' => 'preparing']); 
        return ['status' => 'true'];
    }

    public function changeStatusToGarnishing(Request $request){
        Order::whereId($request->order_id)->update(['order_status' => 'garnishing']); 
        return ['status' => 'true'];
    }

    public function changeStatusToCompleted(Request $request){
        Order::whereId($request->order_id)->update(['order_status' => 'completed']); 
        $table_id = $request->table_id;
        $order_count = Order::whereTableId($table_id)->where('order_type' , 'placed_order')->whereDeletedAt(null)->where('order_status', '!=', 'completed')->count();
        if($order_count == 0){
            Table::whereId($table_id)->update(['is_occupied' => 1]);
            Order::where('table_id' , $table_id)->where('order_type' , 'server_waiter')->delete();
        }

        return ['status' => 'true'];
    }
 
    
}
