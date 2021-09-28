<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Table;
use App\Menu;
use App\Restaurant;
use App\AddCart;
use Session;

use Carbon\Carbon;
use App\Order;
use App\OrderItem;
use App\Payment;

use App\Http\Controllers\StripeCustomClass;

use Mail;
use App\Mail\OrderDetail;
 
class WebsiteController extends Controller
{
    	

    public function stripeCall(){
        return new StripeCustomClass();
    }

	public function menuList(Request $request){ 


		$session_restaurant_id = Session::get('restaurant_id');


		$restaurant_id = $request->restaurant_id;
        $table_id = $request->table_id;
        $table_find = Table::whereId($table_id)->whereDeletedAt(null)->first();


        if($session_restaurant_id != $restaurant_id){
        	Session::put('cart_items' , '');
        }

        Session::put('restaurant_id' , $restaurant_id);
        Session::put('table_id' , $table_id);


        $restaurant_find = Restaurant::whereId($restaurant_id)->with('restaurantImages' , 'restaurantTimings')->first();


        $rest_images = [];
        	$image = $restaurant_find->restaurant_logo;
        	array_push($rest_images, $image);
        foreach ($restaurant_find->restaurantImages as $key) {
        	array_push($rest_images, $key->restaurant_image);
        }

        // return $rest_images;

        if($restaurant_find->is_block != 0){
            return redirect('website/block-restaurant');
        }
        if($restaurant_find->deleted_at != NULL){
            return redirect('website/delete-restaurant');
        }

        $table_details = Table::whereId($table_id)->first();
        if($table_details->deleted_at != NULL){
            return redirect('website/delete-table');
        }

        
        $menus = Menu::where('parent_menu_id' , $table_find->assign_menu_id)->where('is_available' , 1)->OrderBy('category_id' , 'asc')->orderBy('id' , 'desc')->whereDeletedAt(null)->whereRestaurantId($restaurant_id)->with('category')->get();


        foreach ($menus as $menu_list) {
        	// return $menu_list;
			$cart_list =  Session::get('cart_items');

			if(!empty($cart_list)){
				foreach ($cart_list['menu_data'] as $menu_data) {
					if($menu_data['menu_id'] == $menu_list->id){
						$menu_list->quantity = $menu_data['quantity'];
					}
				}
			}else{
				$menu_list->quantity = 0;
			}
        }
        // return $menus;
        // return $rest_images;
        
        return view('website/menu-list' , compact('menus' , 'restaurant_find' , 'restaurant_id' , 'table_id' , 'rest_images'));
	}




	public function addCart(Request $request){
		Session::put('cart_items' , $request->all());
		return response()->json(['message'=> 'Item add to cart successfully.' , 'data' => $request->all()]);
	}


	public function cartListing(Request $request){
		 
		if($request->isMethod('GET')){

			$restaurant_id = Session::get('restaurant_id');
			$table_id = Session::get('table_id');	

			$cart_list =  Session::get('cart_items');

			if($cart_list == ''){
				return redirect('website/no-item-in-cart');
			}

			$restaurant_find = Restaurant::whereId($restaurant_id)->with('restaurantImages' , 'restaurantTimings')->first();
	        if($restaurant_find->is_block != 0){
	            return redirect('website/block-restaurant');
	        }
	        if($restaurant_find->deleted_at != NULL){
	            return redirect('website/delete-restaurant');
	        }

	        $table_details = Table::whereId($table_id)->first();
	        if($table_details->deleted_at != NULL){
	            return redirect('website/delete-table');
	        }

        
			
			$menu_new = [];
			foreach ($cart_list['menu_data'] as $menu) {
				if($menu != null && !empty($menu)){
					$menu_new[] = $menu;
				}
			}
			$cart_list['menu_data'] = $menu_new;

			$cart_menu_details = [];
			if($cart_list){
				foreach ($cart_list['menu_data'] as $key) {

					$check_menu_is_available = Menu::where('id' , $key['menu_id'])->where('is_available' , 1)->where('deleted_at' , null)->first();

					if($check_menu_is_available){
						$data = Menu::where('id' , $key['menu_id'])->with('category')->first();
						array_push($cart_menu_details, $data);
					}
				}
			}

			$cart_menu_details;

			foreach ($cart_menu_details as $menu_list) {
				$cart_list =  Session::get('cart_items');
				if(!empty($cart_list)){

					foreach ($cart_list['menu_data'] as $menu_data) {
						if($menu_data['menu_id'] == $menu_list->id){
							$menu_list->quantity = $menu_data['quantity'];
								// return $menu_data['quantity'];
							$menu_list->price_acc_to_quantity = (float)$menu_list->price * (int)$menu_data['quantity'];
						}
					}
				}else{
					$menu_list->quantity = 0;
				}
	        }
			return view('website/cart',  compact('restaurant_id' , 'table_id' , 'cart_list' , 'cart_menu_details')); 
		}

		if($request->isMethod('POST')){

			$restaurant_id = Session::get('restaurant_id');
			$table_id = Session::get('table_id');


			$date_and_time = date('Y-m-d H:i:s');
			$date =  date('Y-m-d');
			$total_final_amount = $request->final_amount_without_tip;



			$order = [
				'restaurant_id' => $restaurant_id,
				'table_id' => $table_id,
				// 'date' => $date,
				// 'date_time' => $date_and_time,
				'order_status' => 'order_placed',
				'order_type' => 'placed_order',
				'order_text_customization' => $request->order_text_customization,
				'sent_payment_type' => 'Online',
				'tax_percentage' => '10',
				'tax_amount' => $request->tax_10_percent,
				'tip_amount' => $request->tip,
				'total_amount' => $total_final_amount,
			];

			Session::put('order' , $order);
 
			return view('website/payment-page' , compact('order' , 'restaurant_id' , 'table_id' , 'total_final_amount'));

		}
	}



	public function payment(Request $request){

			$restaurant_id = Session::get('restaurant_id');
			$table_id = Session::get('table_id');

			$restaurant_details = Restaurant::where('id' , $restaurant_id)->first();

			$cart_list =  Session::get('cart_items');

			if($cart_list == ''){
				return redirect('website/menu-list/'.$restaurant_id.'/'.$table_id);
			}

			$restaurant_find = Restaurant::where('id' , $restaurant_id)->first();

			if($restaurant_find->is_block == 1){
				return back()->with('error' , 'Restaurant has been blocked by admin.');
			}

			if($restaurant_find->deleted_at != ""){
				return back()->with('error' , 'Restaurant has been deleted by admin.');
			}


			// $cart_list =  Session::get('cart_items');
			 
			// foreach ($cart_list['menu_data'] as $key) {
			// 	$for_menu_name = Menu::where('id' , $key['menu_id'])->first();

			// 	$menu_Details = Menu::where('id' , $key['menu_id'])->where('deleted_at' , null)->where('is_available' , 1)->first();
			// 	if(!$menu_Details){
			// 		return back()->with('Item'.$for_menu_name->item_name .'is not available at a moment.');
			// 	}
			// }

			
			$data = $request->all();

			$explode_month_year = explode('/', $request->expiry_month_year);
            $explode_yy = explode("-",Carbon::now()->toDateString());
            $substr = substr($explode_yy[0], 0,2);
            $expire_year = $substr.$explode_month_year[1];


            $create_customer_id = $this->stripeCall()->createCustomer($data['email_address'],"");

            if($create_customer_id['status'] == 2){

                return back()->with('error','Something went wrong. '.$create_customer_id['error']);
            }
            $stripe_customer_id = $create_customer_id['stripe_customer_id'];

            $create_token = $this->stripeCall()->createCardToken($data['card_number'], $explode_month_year[0], $expire_year, $data['cvv']);


            if($create_token['status'] == 2){
                return back()->with('error','Something went wrong. '.$create_token['error']);
            }

            $token_id = $create_token['token']['id'];


            $description = "";

            $payment_stripe = $this->stripeCall()->createCreditCardPayment($stripe_customer_id, $token_id, $data['final_amount'], $description);

            if($payment_stripe['status'] == 2){
                return back()->with('error','Something went wrong. '.$payment_stripe['error']);
            }
            $transacation_id = $payment_stripe['transacation_id'];










      //       $restaurant_stripe_customer = $this->stripeCall()->createCustomer($restaurant_details['email'],"");
		    // if($restaurant_stripe_customer['status'] == 2){
      //           return back()->with('error','Something went wrong. '.$restaurant_stripe_customer_id['error']);
      //       }	
      //       $restaurant_stripe_customer_id = $restaurant_stripe_customer['stripe_customer_id'];





		    // $bank = $this->stripeCall()->createBankToken();
		    // if($bank['status'] == 2){
      //           return back()->with('error','Something went wrong. '.$bank['error']);
      //       }
		    // $destination =  $bank['data']['bank_account']['id'];




		    // $amount_99_persent = $data['final_amount'] * 99 /100;
		    // return $this->stripeCall()->payout($amount_99_persent,$destination);









 




            $main_order =  Session::get('order');
            $main_order['date'] =  date('Y-m-d');
            $main_order['date_time'] =  date('Y-m-d H:i:s');


			$is_order = Order::create($main_order);
			$order_id = $is_order->id;

			$cart_list =  Session::get('cart_items');
			$sub_order = [
				'order_id' => $order_id,
			];
			foreach ($cart_list['menu_data'] as $key) {
				$menu_Details = Menu::where('id' , $key['menu_id'])->first();
				$sub_order['menu_id'] = $key['menu_id'];
				$sub_order['quantity'] = $key['quantity'];
				$sub_order['item_price'] = $menu_Details->price;
				$sub_order['amount'] = $key['quantity'] * $menu_Details->price;
				OrderItem::create($sub_order);
			}



			$payment = [
				'restaurant_id' => $restaurant_id,
				'order_id' => $is_order->id,
				'payment_date_time' => Carbon::now(),
				'tax_percentage' => 10,
				'tax_amount' =>  $is_order->tax_amount,
				'tip_amount' =>  $is_order->tip_amount,
				'total_amount' =>  $is_order->total_amount,
				'transaction_id' => $transacation_id,
			];
			
			$payment = Payment::create($payment);





			$amount_99_persent = $data['final_amount'] * 99 /100;

            $this->stripeCall()->transferAmountToMerchant($stripe_customer_id = "",$amount_99_persent, $restaurant_details->stripe_merchant_id,$order_id,$card_id_null = "",$transacation_id);




			Table::where('id' , $table_id)->update(['is_occupied' => 2]);

			$email = $request->email_address;
			if(!empty($email)){

				$menu_order_details = OrderItem::where('order_id' , $order_id)->with('menu')->get();

				Mail::to($email)->send(new OrderDetail($restaurant_details ,$is_order , $payment, $menu_order_details));
			}

			Session::put('cart_items' , '');

			Session::put('order_id' , $order_id);


			return redirect('website/book-order');
	}


	public function bookOrder(Request $request){
	    $restaurant_id = Session::get('restaurant_id');
		$table_id = Session::get('table_id');	
		$order_id = Session::get('order_id');
		return view('website/placeorder' , compact('restaurant_id' , 'table_id' , 'order_id'));
	}


	public function noItemInCart(Request $request){
		$restaurant_id = Session::get('restaurant_id');
		$table_id = Session::get('table_id');
		$message = "No item available in cart list.";
		return view('website/message_template' , compact('restaurant_id' , 'table_id' , 'message'));
	}


	public function blockRestaurant(Request $request){
		$restaurant_id = Session::get('restaurant_id');
		$table_id = Session::get('table_id');
		$message = "Restaurant has been blocked by admin.";
		return view('website/message_template' , compact('restaurant_id' , 'table_id' , 'message'));
	}

	public function deleteRestaurant(Request $request){
		$restaurant_id = Session::get('restaurant_id');
		$table_id = Session::get('table_id');
		$message = "Restaurant has been deleted by admin.";
		return view('website/message_template' , compact('restaurant_id' , 'table_id' , 'message'));
	}

	public function deleteTable(Request $request){
		$restaurant_id = Session::get('restaurant_id');
		$table_id = Session::get('table_id');
		$message = "Table has been deletd by restaurant.";
		return view('website/message_template' , compact('restaurant_id' , 'table_id' , 'message'));
	}



	// public function paymentInvoice(Request $request){
	// 	Mail::to('demo@yopmail.com')->send(new OrderDetail());
	// 	return view('website/order-details-template');
	// }


 



}
