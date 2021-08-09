<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Restaurant;
use App\Menu;
use App\Http\Controllers\Api\v1\ResponseController;
use App\Validation;

use Illuminate\Support\Arr;
use App\BusinessModel\OrderBusiness;
use App\Table;
use App\Order;
use App\AddCart;
use App\OrderItem;

use Validator;
use Carbon\Carbon;
use DB;
use Auth;
class RestaurantController extends ResponseController
{
    
    public function orderBusiness(){
        return new OrderBusiness();
    }
    public function restaurantList(Request $request){
        $lat = $request->lat;
        $lon = $request->lon;

        
    	if($request->search){

    		$data = Restaurant::where('is_block' , 0)->where('is_approved' , 1)->where('deleted_at' , NULL)->where('restaurant_name', 'like', '%'. $request->search . '%')->orderBy('id' , 'desc')->with('restaurantImages','restaurantTimings')->paginate(10);
    	}

        // if($lat && $lon){

        //     $distance_in_km = "111.045 * DEGREES(ACOS(COS(RADIANS($lat))
        //                  * COS(RADIANS(lat))
        //                  * COS(RADIANS(lon) - RADIANS($lon))
        //                  + SIN(RADIANS($lat))
        //                  * SIN(RADIANS(lat))))
        //                  ";
        //     $restaurants = Restaurant::where(DB::raw("$distance_in_km"),'<=',env('MINIMUM_MAP_DISTANCE'))
        //                     ->whereDeletedAt(null)
        //                     ->select(DB::raw('*, ( 6367 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('.$lon.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance'))
        //                 ->having('distance', '<', env('MINIMUM_MAP_DISTANCE'))
        //                 ->orderBy('distance') 
        //                 ->get();

        // }

        else{
    		$data = Restaurant::where('is_block' , 0)->where('is_approved' , 1)->where('deleted_at' , NULL)->orderBy('id' , 'desc')->with('restaurantImages','restaurantTimings')->paginate(10);
    	}

        return $this->responseOk("Restaurant Listing", $data);
    }

    public function restaurantDetails(Request $request, $id){
    	$restaurant_id = $request->id;
    	$restaurant_find = Restaurant::whereId($restaurant_id)->with('restaurantImages','restaurantTimings')->first();
        return $this->responseOk("Restaurant Details", $restaurant_find);
    }

    public function menuListing(Request $request){
        $restaurant_id = $request->restaurant_id;
        $table_id = $request->table_id;
        $table_find = Table::whereId($table_id)->whereDeletedAt(null)->first();


        $is_restaurant_block = Restaurant::where('id' , $restaurant_id)->first();
        if($is_restaurant_block->is_block != 0){
            return $this->responseWithErrorCode("This restaurant is blocked by admin.",406);
        }

        if($is_restaurant_block->deleted_at != NULL){
            return $this->responseWithErrorCode("This restaurant is deleted by admin.",406);
        }

        
        $user = auth()->guard()->user();

        if(empty($table_find)){
            return $this->responseWithErrorCode("The table you are looking for does not exist or it has been deleted by restaurant.",406);
        }

        if($table_find->is_occupied != 1){

            $checkOtherBookedActiveOrder = Order::where('user_id','!=', $user->id)->whereTableId($table_find->id)->where('order_status','!=','completed')->first();
            if(!empty($checkOtherBookedActiveOrder)){

                return $this->responseWithErrorCode("Table already booked.",406);
            }

            $check_is_there_any_order = Order::where('user_id', $user->id)->whereTableId($table_find->id)->where('order_status','!=','completed')->first();
            if(empty($check_is_there_any_order)){
                return $this->responseWithErrorCode("Table already booked.",406);
            }
        }

        if($table_find->is_occupied == 1){

            $check = Order::where('user_id', $user->id)->where('table_id' , '!=' , $table_find->id)->where('order_status','!=','completed')->first();
            if($check){
                return $this->responseWithErrorCode("You already book one table.",406);
            }
        }
        
        $menus = Menu::where('parent_menu_id' , $table_find->assign_menu_id)->OrderBy('category_id' , 'asc')->whereDeletedAt(null)->whereRestaurantId($restaurant_id)->with('category')->get();


        /*For Quantity count*/
        foreach ($menus as $key => $value) {
            $quantity = AddCart::whereUserId($user->id)
                            ->where('menu_id' , $value->id)
                            ->first();
            if($quantity){
                $value->quantity = $quantity->quantity;
            }else{
                $value->quantity = 0;
            }
        }

        $restaurant_find = Restaurant::whereId($restaurant_id)->with('restaurantImages' , 'restaurantTimings')->first();
        return response()->json(['result' => 'Success', 'message' => 'Menu Listing', 'data' => $menus, 'restaurant_details' => $restaurant_find]);
      //  return $this->responseOk('Menu Listing', $menus);
    }



    public function orderBook(Request $request){

        $this->is_validationRule(Validation::userOrderBook($Validation = "", $message = "") , $request);
        $time_zone = $request->time_zone;
        date_default_timezone_set($time_zone);
        $date_and_time = Carbon::now()->toDateString() . " " . Carbon::now()->toTimeString();

        if(!isset($request->menu_ids)){
            return $this->responseWithErrorCode("Please enter menu_ids.",406);
        }

        $type_menu_ids = gettype($request->menu_ids);
        if($type_menu_ids != "array"){
            return $this->responseWithErrorCode("Please enter menu ids in array.",406);
        }

        $user = auth()->guard()->user();
        $menu_res = [];

        foreach($request->menu_ids as $menu){
            $menu_id = isset($menu['menu_id']) ? $menu['menu_id'] : "";
            $quantity = isset($menu['quantity']) ? $menu['quantity'] : "";
            $instructions = isset($menu['instructions']) ? $menu['instructions'] : "";



            if(empty($menu_id)){
                return $this->responseWithErrorCode("Please enter menu id.", 406);
            }

            if(empty($quantity)){
                return $this->responseWithErrorCode("Please enter quantity.",406);
            }

            $menu_find = Menu::whereId($menu_id)->whereDeletedAt(null)->first();
            if(empty($menu_find)){
                return $this->responseWithErrorCode("The item you want to order may be deleted by restaurant.",406);
            }

            $item_price = $menu_find->price;
            $item_into_quantity_price = $quantity * $item_price;
            $menu_id = $menu_find->id;
            $menu_res[] =   [
                                'item_price' => $item_price, 
                                'quantity' => (int)$quantity, 
                                'item_into_quantity_price' => $item_into_quantity_price, 
                                'menu_id' => $menu_id,
                                'instructions' => $instructions
                            ];


        }

        $pluck_item_into_quantity_price = Arr::pluck($menu_res,'item_into_quantity_price');

        $total_item_price = array_sum($pluck_item_into_quantity_price);


        $discount_amount = 0;
        if($request->discount_percentage && $request->discount_percentage != 0){
            $discount_amount = ($total_item_price / 100) * $request->discount_percentage;
        }

        $tax_amount = 0;
        if($request->tax_percentage && $request->tax_percentage != 0){
            $tax_amount = ($total_item_price / 100) * $request->tax_percentage;
        }


        $tip_amount = $request->tip_amount;

        $total_amount_paid = $total_item_price - $discount_amount + $tax_amount + $tip_amount;
        // $total_amount_paid = $total_item_price - $discount_amount + $tax_amount;


        if($total_amount_paid != $request->total_amount){
            return $this->responseWithErrorCode("Your calculation for amount is wrong.",400);
        }

        $data = [
                    "total_amount_paid" => $total_amount_paid, 
                    "menu_res" => $menu_res, 
                    "discount_percentage" => $request->discount_percentage, 
                    "tax_percentage" => $request->tax_percentage, 
                    "discount_amount" => $discount_amount, 
                    "tax_amount" => $tax_amount,
                    "table_id" => $request->table_id, 
                    "date_time" => $date_and_time,
                    'tip_amount' => $request->tip_amount, 
                    'transaction_id' => $request->transaction_id, 
                    'restaurant_id' => $request->restaurant_id,
                    'user_id' => $user->id, 
                    // 'address' => $request->address, 
                    // 'lat' => $request->lat, 
                    // 'lon' => $request->lon, 
                    // 'country_code' => $request->country_code, 
                    // 'phone_number' => $request->phone_number
                ];

        $fill_order = [
                    'restaurant_id' => (int)$request->restaurant_id, 
                    'table_id' => (int)$request->table_id, 
                    'date_time' => $date_and_time, 
                    'order_status' => 'order_placed',
                    'order_type' => 'placed_order',
                    'sent_payment_type' => 'online',
                    'discount_percentage' => (int)$request->discount_percentage,
                    'discount_amount' => $discount_amount, 
                    'tax_percentage' => (int)$request->tax_percentage, 
                    'tax_amount' => $tax_amount, 
                    'tip_amount' => (int)$tip_amount,
                    'total_amount' => $total_amount_paid,
                    'user_id' => $user->id, 
                    'description' => $request->description,
                    // 'address' => $request->address, 
                    // 'lat' => $request->lat, 
                    // 'lon' => $request->lon, 
                    // 'country_code' => $request->country_code, 
                    // 'phone_number' => $request->phone_number
                ];
        //  $data = ["total_amount_paid" => $total_amount_paid, "menu_res" => $menu_res, "discount_percentage" => $request->discount_percentage, "tax_percentage" => $request->tax_percentage, "discount_amount" => $discount_amount, "tax_amount" => $tax_amount,"table_id" => $request->table_id, "date_time" => $request->date_time, 'transaction_id' => $request->transaction_id, 'restaurant_id' => $request->restaurant_id,'user_id' => $user->id, 'address' => $request->address, 'lat' => $request->lat, 'lon' => $request->lon, 'country_code' => $request->country_code, 'phone_number' => $request->phone_number];

        // $fill_order = ['restaurant_id' => (int)$request->restaurant_id, 'table_id' => (int)$request->table_id, 'date_time' => $request->date_time, 'order_status' => 'order_placed','order_type' => 'placed_order','sent_payment_type' => 'online','discount_percentage' => (int)$request->discount_percentage,'discount_amount' => $discount_amount, 'tax_percentage' => (int)$request->tax_percentage, 'tax_amount' => $tax_amount, 'total_amount' => $total_amount_paid,'user_id' => $user->id, 'address' => $request->address, 'lat' => $request->lat, 'lon' => $request->lon, 'country_code' => $request->country_code, 'phone_number' => $request->phone_number];


        $order = $this->orderBusiness()->orderBookSave($data, $fill_order);
        $clear_cart = AddCart::where('user_id' , $user->id)->delete();

        return $order;


    }

    public function serverWaiterOrder(Request $request){
        $this->is_validationRule(Validation::serverWaiterOrder($Validation = "", $message = "") , $request);
        $user = auth()->guard()->user();

        $data = ['restaurant_id' => $request->restaurant_id, 'date_time' => $request->date_time, 'order_text_customization' => $request->order_text_customization,'order_status' => 'order_placed','order_type' => 'server_waiter','sent_payment_type' => 'offline','tax_amount' => 0,'tip_amount' => 0, 'total_amount' => 0,'user_id' => $user->id];

        $add_order = $this->orderBusiness()->serverWaiter($data);
        return $this->responseOk('Order request sent succesfully.',$add_order);
    }
        


    public function addCart(Request $request){
        $user_id = auth()->guard()->user()->id;

        $message = [
            'restaurant_id.required'    => 'Please enter restaurant id.',
            'table_id.required'         => 'Please enter table id.',
            'menu_id.required'          => 'Please enter menu id.',
            'quantity.required'         => 'Please enter quantity id.',
            
        ];

        $validator = Validator::make($request->all(), [
            'restaurant_id'          => 'required',
            'table_id'               => 'required',
            'menu_id'                => 'required',
            // 'quantity'               => 'required',
           
        ], $message);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()->first()],400); 
        }


        $data = [
            'user_id' => $user_id,
            'restaurant_id' => $request->restaurant_id,
            'table_id' => $request->table_id,
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'instructions' => $request->instructions,
        ];


        $menu_id = $data['menu_id'];
        $check_menu_exist = Menu::where('id' , $menu_id)
                            ->where('deleted_at' , '!=' , NULL)
                            ->first();
        if($check_menu_exist){
            return response()->json(['result' => 'error' , 'message' => 'The item you want to order may be deleted by restaurant.'],400);
        }                 


        $where =[
            'user_id' => $user_id,
            'restaurant_id' => $request->restaurant_id,
            'table_id' => $request->table_id,
            'menu_id' => $request->menu_id,
        ];

 
        $check_another_restaurant_in_cart = AddCart::where('restaurant_id' , '!=', $request->restaurant_id )
                                            ->where('user_id' , $user_id)
                                            ->first();
        if($check_another_restaurant_in_cart){
            return response()->json(['result' => 'error' , 'message' => 'You cannot order from multiple restaurant at a time'],400);
        }else{
            
            $check_another_table_in_cart = AddCart::where('user_id' , $user_id)
                                            ->where('restaurant_id' , $request->restaurant_id )
                                            ->where('table_id' , '!=' , $request->table_id)->first();
            if($check_another_table_in_cart){
                return response()->json(['result' => 'error' , 'message' => 'You already book one table'],400);
            }
        }





 
        if($request->instructions != '' &&  $request->quantity == ''){
            return response()->json(['result'=>'error' , 'message' => 'Please enter qunatity first.'] , 400);
        }

        $check_item_already_present = AddCart::where($where)->first();

        if($check_item_already_present){

            $quantity = $request->quantity;
            if($quantity == 0){
                AddCart::where($where)->delete();
                return response()->json(['result'=>'success' , 'message' => 'Item remove from cart succesfully.']);  
            }else{
                $update = AddCart::where($where)->update(['quantity'=> $request->quantity , 'instructions'=> $request->instructions]);
                return response()->json(['result'=>'success' , 'message' => 'Quantitiy update succesfully.']);  
            }
        }else{
            $create = AddCart::create($data);
            return response()->json(['result'=>'success' , 'message' => 'Item added to cart succesfully.']);
        }
    }


    public function cartListing(Request $request){
        $user_id = auth()->guard()->user()->id;

        $cart_listing = AddCart::where(['user_id'=> $user_id])->with('menu')->get();
         return response()->json(['result'=>'success' , 'message' => 'Cart listing get succesfully.' , 'data'=>$cart_listing]);
    }



    public function restaurantTableList(Request $request){  
        $restaurant_id = $request->restaurant_id;

        $user = Auth::guard()->user();
        $pluck_table_id = Order::whereUserId($user->id)->where('order_status','!=','completed')->pluck('table_id');
        $table_list = Table::where(function($query) use ($restaurant_id){

                            $query->whereRestaurantId($restaurant_id);
                            $query->whereDeletedAt(null);
                            $query->whereIsOccupied(1);
                        })->orWhere(function($query) use ($restaurant_id, $pluck_table_id){
                            $query->whereRestaurantId($restaurant_id);
                            $query->whereDeletedAt(null);
                            $query->whereIn('id', $pluck_table_id);

                        })
                        ->get();

        $count_table = count($table_list);
        if($count_table == 0){
            return response()->json(['result'=>'error' , 'message' => 'No table available.'] , 400);
        }else{
            return response()->json(['result'=>'success' , 'message' => 'Table listing gets succesfully.' , 'data'=>$table_list],200);
        }
    }



    public function menuListWithoutQr(Request $request){
        $restaurant_id = $request->restaurant_id;
        $menu_list = Menu::where('restaurant_id' , $restaurant_id) ->paginate(25);  
            return response()->json(['result'=>'success' , 'message' => 'Menu listing gets succesfully.' , 'data'=>$menu_list],200);
    }



    public function checkTableStatus(Request $request){
        $user_id = Auth::guard()->user()->id;
        $table_id = $request->table_id;

        $check_table_status = Order::where('table_id' , $table_id)
                                ->where('user_id' ,$user_id)
                                ->where('order_status' , '!=' , 'completed')
                                ->first();

        if($check_table_status){
            return response()->json(['result'=>'sucess'],200);
        }
        else{
            return response()->json(['result'=>'error'],400);
        }

    }




    public function requestWaiter(Request $request){


        $message = [
            'time_zone.required'     => 'Please enter time zone.',
            'description.required'   => 'Please enter description.',
            
        ];

        $validator = Validator::make($request->all(), [
            'time_zone'   => 'required',
            'description' => 'required',
           
        ], $message);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()->first()],400); 
        }



        $user_id = Auth::guard()->user()->id;


        $time_zone = $request->time_zone;
        date_default_timezone_set($time_zone);
        $date_and_time = Carbon::now()->toDateString() . " " . Carbon::now()->toTimeString();


        $restaurant_id = $request->restaurant_id;
        $table_id = $request->table_id;
        $order_text_customization = $request->description;

        $data = [
            'user_id' => $user_id,
            'restaurant_id' => $restaurant_id,
            'table_id' => $table_id,
            'date_time' => $date_and_time,
            'order_type' => 'server_waiter',
            'order_text_customization' => $order_text_customization,
        ];

        $is_created = Order::create($data);

        Table::whereId($table_id)->update(['is_occupied' => 3]);

        if($is_created){
            return response()->json(['result' => 'success' ,  'message' => 'Request for waiter submitted succesfully.'],200);
        }
    }




    public function orderList(Request $request){
        $user_id = Auth::guard()->user()->id;

        $message = [
            'type.required'  => 'Please enter type.',
            
        ];

        $validator = Validator::make($request->all(), [
            'type'   => 'required', //1=>present , 2=> past order
           
        ], $message);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()->first()],400); 
        }


        $type = $request->type;

        if($type == 1){
            $active_order = Order::whereUserId($user_id)->where('order_type' , 'placed_order')->where('order_status' , '!=' , 'completed')->with('orderItemsWithMenu' , 'restaurant')->get();

            return response()->json(['result' => 'success'  , 'message' => 'Order list get succesfully.' , 'data' => $active_order] , 200);
        }


        if($type == 2){
            $active_order = Order::whereUserId($user_id)->where('order_type' , 'placed_order')->where('order_status' , 'completed')->with('orderItemsWithMenu' , 'restaurant')->get();

            return response()->json(['result' => 'success'  , 'message' => 'Order list get succesfully.' , 'data' => $active_order] , 200);
        }


        else{
             return response()->json(['result' => 'error'  , 'message' => 'No order available.'] , 400 );
        }


    }



    public function orderListDetails(Request $request){
        $message = [
            'order_id.required'  => 'Please enter order id.',
            
        ];

        $validator = Validator::make($request->all(), [
            'order_id'   => 'required', 
           
        ], $message);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()->first()],400); 
        }

        $order_id  = $request->order_id;

        $order_details = Order::whereId($order_id)->with('orderItemsWithMenu' , 'restaurant')->get();


        // $order_details = OrderItem::whereOrderId($order_id)->with('menu')->get();
        // foreach ($order_details as $key => $value) {
        //     $order = Order::where('id' , $value->order_id)->first();
        //     $value->order = $order; 
        // }

         return response()->json(['result' => 'success'  , 'message' => 'Order details get succesfully.' , 'data' => $order_details] , 200);
    }



}
