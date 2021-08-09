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

use App\User;
use App\Table;
use App\Order;
	
class DashboardController extends Controller
{
    public function dashboard(Request $request){
    	$restaurant_id = Auth::guard('restaurant')->user()->id;
    	$total_table = Table::where('restaurant_id' , $restaurant_id)
                        ->where('deleted_at' , null)
                        ->count();
    	// $total_users = User::count();
    	$total_restaurant_user_id = Order::where('restaurant_id' , $restaurant_id)
				    					->distinct('user_id')
				    					->pluck('user_id');
		$total_users = count($total_restaurant_user_id);

        return view('restaurant.dashboard' ,compact('total_table' , 'total_users'));
     }
}
