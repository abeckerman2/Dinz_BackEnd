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
use App\Restaurant;

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

        $total_order = Order::where('restaurant_id' , $restaurant_id)->count();

        $current_date = date('Y-m-d');
        $first_date_of_current_month =  date('Y-m-01');

        $first_date_of_current_year =  date('Y-01-01');


        // $date = date_create($current_date);
        // $date_of_last_year = date_sub($date, date_interval_create_from_date_string('365 days'));

        // dd($date_of_last_year['']); die();


        $today_earning = Order::where('restaurant_id' , $restaurant_id)->where('date' , $current_date)->sum('total_amount');
        $this_month = Order::where('restaurant_id' , $restaurant_id)->where('date' , '>=' ,  $first_date_of_current_month)->sum('total_amount');
        $this_year = Order::where('restaurant_id' , $restaurant_id)->where('date' , '>=' ,  $first_date_of_current_year)->sum('total_amount');


        return view('restaurant.dashboard' ,compact('total_table' , 'total_users' , 'total_order' , 'today_earning' , 'this_month' , 'this_year'));
     }




     public function stripeRedirect(Request $request){

        $client_id = env('STRIPE_CLIENT_ID');
        $stripe_url = 'https://connect.stripe.com/oauth/authorize?response_type=code&client_id='.$client_id.'&scope=read_write';
        return Redirect::to($stripe_url);
    }




    public function stripeCallback(Request $request){

        $restaurant_id = Auth::guard('restaurant')->user()->id;

        $user = Restaurant::where('id' , $restaurant_id)->first();

        $request_data = $request;


        $authorize_code = $request_data['code'];
       // dd($authorize_code);

        $client_secret = env('STRIPE_SECRET_KEY');

        $curl = curl_init();
        $ex =  curl_setopt_array($curl, [
          CURLOPT_URL => 'https://connect.stripe.com/oauth/token',
          CURLOPT_RETURNTRANSFER => true,
        //  CURLOPT_HTTPHEADER => ['Authorization: Bearer'. ' '.$client_secret],
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => http_build_query([
            'client_secret' => $client_secret,
            'code' => $authorize_code,
            'grant_type' => 'authorization_code'
          ])
        ]);

         $response = curl_exec($curl);

        $res = (json_decode($response));

        // if($res->error){

        //     if($res->error == "invalid_grant"){
        //           Session::flash('danger','Something went wrong please try again.');
        //           return redirect(url('website/edit-profile'));
        //     }
        // }

        if(array_key_exists('stripe_user_id', $res)){

        $user->stripe_merchant_id = $res->stripe_user_id;
        $user->update();
        }else{
            return redirect(url('restaurant/dashboard'))->with("error","Something went wrong please try again.");
        }
        //Session::flash('message','Account connected with gateway successfully.');
        return redirect(url('restaurant/dashboard'))->with("success","Account connected with gateway successfully.");

    }



}
