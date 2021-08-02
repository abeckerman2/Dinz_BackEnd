<?php

namespace App\Http\Controllers\Restaurant;



header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BusinessModel\RestaurantBusinessModel;
use Hash;
use App\Restaurant;
use Illuminate\Support\Str;
use App\Mail\ForgotRestaurantPassword;

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

class ProfileController extends Controller
{

    private function RestaurantBusinessModel(){
        return new RestaurantBusinessModel();
    }

    private function uploadImage($destinationPath,$image){
        $imageName = date('mdY') . uniqid().'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath, $imageName);
        return $imageName;
    }

    public function createRestaurant(Request $request){
        if($request->isMethod('GET')){
            return view('restaurant.register');
        }
        if($request->isMethod("POST")){
            $data = $request->all();
            $data['password'] = Hash::make($request->password);

            $is_created = $this->RestaurantBusinessModel()->createRestaurant($data);

            return redirect('restaurant/login')->with('success' , 'Restaurant has been created successfully.');

        }
    }


    public function checkExistEmailUser(Request $request){
        $email = $request->email;
        $find_restaurant = Restaurant::whereEmail($email)->first();

        if(empty($find_restaurant)){
            return 0;
        }else{
            return 1;
        }
    }

    public function checkExistPhoneNumberUser(Request $request){
        $phone_number = $request->phone_number;
        $restaurant_id = $request->restaurant_id;
        if(!empty($restaurant_id)){

            $find_restaurant = Restaurant::wherePhoneNumber($phone_number)->where('id','!=',$restaurant_id)->first();
        }else{
            $find_restaurant = Restaurant::wherePhoneNumber($phone_number)->first();
        }
        if(empty($find_restaurant)){
            return 0;
        }else{
            return 1;
        }
    }



    public function login(Request $request){
        if($request->isMethod("GET")){
            return view('restaurant.login');
        }
        if($request->isMethod('POST')){

            $email = $request->email;
            $password = $request->password;
            if(Auth::guard('restaurant')->attempt(array('email' => $email , 'password' => $password))){ 
                $rememberToken = str_random(64);
                Restaurant::whereEmail($email)->update(['remember_token' => $rememberToken]);
                return redirect('restaurant/dashboard')->with('success' , 'Login successfully.'); 
                $request->session()->put('remember_token', $rememberToken);
            }else{
                return back()->with('error' , 'Email address or password is incorrect.');
            }
        }
    }

    public function forgotPassword(Request $request){ 
        if($request->isMethod('GET')){
            return view('restaurant.forgot-password');
        }
        if($request->isMethod('POST')){
            $email = $request->email;

            $is_email_exist = Restaurant::where('email', $email)->first();
            $token = Str::Random();
            $link = url('restaurant/reset-password',$token);

            if($is_email_exist){

                $data = [
                    'email' => $email,
                    'token' => $token,
                ];
                DB::table('password_resets')->insert($data);

                Mail::to($email)->send(new ForgotRestaurantPassword($is_email_exist , $link));
                return back()->with('success' , 'A reset password link has been sent to your registered email address.');
            }else{
                return back()->with('error' , 'Email address does not exist.');
            }
        }
    }

    public function resetPassword(Request $request){
        if($request->isMethod('GET')){
            $token = $request->token;
            $tokenData = DB::table('password_resets')
                        ->whereToken($token)->first();

            if(!$tokenData) {
                return redirect("restaurant/link-expired");
            }
            if(Carbon::now() > Carbon::parse($tokenData->created_at)->addMinutes(10)){
                return redirect("restaurant/link-expired")->with("error","Invalid token");
            }      
            return view("restaurant/reset-password");
        }
        if($request->isMethod('POST')){
            $token = $request->token;
            $getDetails = DB::table('password_resets')->whereToken($token)->first();
             
            if($getDetails) {
                $email = $getDetails->email;
                $password = Hash::make($request->password);
                $data = array('password'=>$password);

                $is_updated  = Restaurant::where("email",$email)->update($data);

                if($is_updated)
                {
                    DB::table('password_resets')->where("email",$email)->delete();
                    return redirect(url("restaurant/feedbackReset"))->with("success","your password changed successfully");
                }else {
                    return back()->with("error","Unable to reset your password");
                }
                 
            } else {
                return back()->with("error","Unable to reset your password");
            }
        }
    }



    public function feedbackReset(Request $request){
            $title = "Password Reset Success";
            $message = " Your password has been reset successfully.";
            $type = "success";
        return view("restaurant/email/feedback" , compact("title" , "message" , "type"));
    }


    public function linkExpired(Request $request){
            $title = "Link Expired";
            $message = "This Link has been Expired.";
            $type = "error";
        return view("restaurant/email/feedback" , compact("title" , "message" , "type"));
    }


    public function logout(Request $request){
        Auth::guard('restaurant')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('restaurant/login')->with('success' , 'Logout successfully.');
    }
			
}
