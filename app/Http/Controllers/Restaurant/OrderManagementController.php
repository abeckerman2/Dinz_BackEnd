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

class OrderManagementController extends Controller
{
    public function orderManagement(Request $request){
        return view('restaurant.present-order');
    }

    public function presentOrderDetails(Request $request){
        return view('restaurant.present-order-details');
    }

    public function presentOrderEdit(Request $request){
        return view('restaurant.present-order-edit');
    }

    public function createOrder(Request $request){
        return view('restaurant.create-order');
    }

    public function pastOrderDetails(Request $request){
        return view('restaurant.past-order-details');
    }

    public function pastOrders(Request $request){
        return view('restaurant.past-orders');
    }

    public function todayOrders(Request $request){
        return view('restaurant.today-orders');
    }

    public function todayOrderDetails(Request $request){
        return view('restaurant.today-order-details');
    }
}
