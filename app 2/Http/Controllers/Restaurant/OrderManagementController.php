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
use App\Table;
use App\Order;
use App\OrderItem;



class OrderManagementController extends Controller
{
    public function orderManagement(Request $request){
        $order = Order::where('order_status', '!=' , 'completed')->orderBy('id' , 'desc')->with('orderItemsWithMenu' , 'table')->get();
        return view('restaurant.present-order' , compact('order'));
    }

    public function presentOrderDetails(Request $request , $id){
        $order_details = Order::where('id' , $id)->with('orderItemsWithMenu','user','payment')->first();
        return view('restaurant.present-order-details' , compact('order_details'));
    }

    public function presentOrderEdit(Request $request){
        return view('restaurant.present-order-edit');
    }

    public function createOrder(Request $request){
        return view('restaurant.create-order');
    }


    public function pastOrders(Request $request){

        if($request->isMethod('GET')){
            $current_date =  date('Y-m-d');
            $order = Order::where('date' , '<' , $current_date)->orderBy('id' , 'desc')->with('orderItemsWithMenu' , 'table')->get();

            $start_date = "";
            $end_date = "";

            return view('restaurant.past-orders' , compact('order' , 'start_date' , 'end_date'));
        }
        if($request->isMethod('POST')){


            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $order = Order::where('date' , '>=' , $start_date)->where('date' , '<=' , $end_date)->orderBy('id' , 'desc')->with('orderItemsWithMenu' , 'table')->get();
            return view('restaurant.past-orders' , compact('order' , 'start_date' , 'end_date'));

        }
    }

    public function pastOrderDetails(Request $request , $id){
        $order_details = Order::where('id' , $id)->with('orderItemsWithMenu','user','payment')->first();
        return view('restaurant.past-order-details' , compact('order_details'));
    }

    public function todayOrders(Request $request){
        $current_date =  date('Y-m-d');
        $order = Order::where('date' , $current_date)->where('order_status' , 'completed')->orderBy('id' , 'desc')->with('orderItemsWithMenu' , 'table')->get();
        return view('restaurant.today-orders' , compact('order'));
    }

    public function todayOrderDetails(Request $request , $id){
        $order_details = Order::where('id' , $id)->with('orderItemsWithMenu','user','payment')->first();
        return view('restaurant.today-order-details' , compact('order_details'));
    }


    public function deleteOrder(Request $request){
        $order_id = $request->delete_order_id;
        Order::where('id' , $order_id)->delete();
        OrderItem::where('order_id' , $order_id)->delete();
        return back()->with('success' , 'Order has been deleted successfully.');
    }
}
