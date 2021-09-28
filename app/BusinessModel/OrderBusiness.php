<?php

namespace App\BusinessModel;

use Illuminate\Database\Eloquent\Model;
use Hash;
use App\User;
use GuzzleHttp;
use Auth;
use Mail;
use DB;
use Carbon\Carbon;
use App\Order;
use App\OrderItem;
use App\Payment;
use App\Table;
class OrderBusiness extends Model
{
    public function orderBookSave($data, $fill_order){
    	$order = new Order();
    	$order->fill($fill_order);
    	$order->save();
    	
    	foreach ($data['menu_res'] as $menu) {
	    	$order_item = new OrderItem();
            $order_item->user_id = $data['user_id'];
	    	$order_item->order_id = $order->id;
	    	$order_item->menu_id = $menu['menu_id'];
	    	$order_item->quantity = $menu['quantity'];
	    	$order_item->item_price = $menu['item_price'];
	    	$order_item->amount = $menu['item_into_quantity_price'];
            $order_item->instructions = $menu['instructions'];
	    	$order_item->save();

    	}

    	$payment = new Payment();
        $payment->user_id = $data['user_id'];
    	$payment->restaurant_id = $data['restaurant_id'];
    	$payment->order_id = $order->id;
    	$payment->payment_date_time = $data['date_time'];
    	$payment->discount_percentage = $data['discount_percentage'];
    	$payment->discount_amount = $data['discount_amount'];
    	$payment->tax_percentage = $data['tax_percentage'];
    	$payment->tax_amount = $data['tax_amount'];
    	$payment->tip_amount = $data['tip_amount'];
    	$payment->total_amount = $data['total_amount_paid'];
        $payment->transaction_id = $data['transaction_id'];
    	$payment->save();

        Table::whereId($data['table_id'])->update(['is_occupied' => 2]);

    	$order_res = Order::whereId($order->id)->with('orderItems')->first();
    	$order_res->payment = $payment;

    	return $order_res;

    }

    public function serverWaiter($data){
        $order = new Order();
        $order->fill($data);
        $order->save();
        return $order;
    }
}
