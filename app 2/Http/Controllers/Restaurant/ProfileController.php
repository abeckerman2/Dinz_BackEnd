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
use App\RestaurantDocs;
use App\Table;

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


            $country_code = str_replace('+' , '' ,$request->country_code);

            if($country_code == ''){
                $data['country_code'] = 1;
            }else{
                $data['country_code'] = $country_code;
            }

            $is_created = $this->RestaurantBusinessModel()->createRestaurant($data);

            return redirect('restaurant/login')->with('success' , 'Your registration request is under process, please wait for admin confirmation.');
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

                $check_approved_no_not = Restaurant::whereEmail($email)->first();
                if($check_approved_no_not->is_approved == 0){
                        Auth::guard('restaurant')->logout();
                        $request->session()->flush();
                        $request->session()->regenerate();
                    return back()->with('error' , 'Your restaurant account is not approved by admin.');
                }

                if($check_approved_no_not->is_approved == 2){
                        Auth::guard('restaurant')->logout();
                        $request->session()->flush();
                        $request->session()->regenerate();
                    return back()->with('error' , 'Your restaurant account has been rejected by admin.');
                }

                if($check_approved_no_not->is_block == 1){
                        Auth::guard('restaurant')->logout();
                        $request->session()->flush();
                        $request->session()->regenerate();
                    return back()->with('error' , 'Your restaurant account has been blocked by admin.');
                }


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
 
            /*if (strpos($email, '.@') !== false) {
                return back()->with('error' , 'Please enter valid email address.');
            }*/


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
        return redirect('restaurant/login')->with('success' , 'Logged out successfully.');
    }


    public function checkEmail(Request $request) {
        $email_address = $request->email;
        if($email_address){
                $where = [['email',$email_address]];
                // $checkUser = $this->RestaurantProfileModel()->checkParkCeoEmail($where);
                $checkUser = Restaurant::where($where)->first();
                if($checkUser) {
                    echo(json_encode("Email address already exist.")); 
                } else {
                    echo(json_encode(true)); 
                }
        }
    }


    public function checkPhone(Request $request) {
        $phone_number = $request->phone_number;
        if($phone_number){
                $where = [['phone_number',$phone_number]];
                // $checkUser = $this->RestaurantProfileModel()->checkParkCeoEmail($where);
                $checkUser = Restaurant::where($where)->first();
                if($checkUser) {
                    echo(json_encode("Phone number already exist.")); 
                } else {
                    echo(json_encode(true)); 
                }
        }
    }





    public function documentManagement(Request $request){
        $restaurant_id = Auth::guard('restaurant')->user()->id;
        $data = RestaurantDocs::where('restaurant_id' , $restaurant_id)->where('deleted_at' , null)->orderBy('id' , 'desc')->get();
        return view('restaurant/document-management' , compact('data'));
    }




    public function addDocument(Request $request){

        if($request->isMethod('GET')){

            return view('restaurant/document-add');
        }
        if($request->isMethod("POST")){

            $restaurant_id= Auth::guard('restaurant')->user()->id;
            $data = [
                'document_name' => $request->document_name,
                'file_type' => $request->file_type,
                'restaurant_id' => $restaurant_id,
            ];

            if($request->hasFile('image')) {
               $file = $request->file('image');
               $filename = time() . '.' . $file->getClientOriginalExtension();
               // $file->move(storage_path()."/".env('CATEGORY_PATH'), $filename);
               $file->move(storage_path(). DIRECTORY_SEPARATOR . "app/public/restaurant/restaurant_docs" , $filename);
               $data["file"] = $filename;
            } 

            $qr_code_name = date('mdYHis') . uniqid() . '.png';
            $data['qr_code_name'] = $qr_code_name;


            $scan_document_open = url('public/storage/restaurant/restaurant_docs').'/'.$filename;

            $img_store = storage_path() . '/'. env('RESTAURANT_DOC_QR_CODE') . '/' . $qr_code_name;
            $qr_code = \QrCode::format('png')
                         ->size(500)->errorCorrection('H')
                         ->generate($scan_document_open, $img_store);  

            $is_created = RestaurantDocs::create($data);

            if($is_created){
                return redirect('restaurant/document-management')->with('success' , 'Document has been uploaded successfully.');
            }else{
                return back()->with('error' , 'Unable to upload document.');
            }
        }
    }


    public function viewDocument(Request $request , $id){ 
        $data = RestaurantDocs::where('id' , $id)->first();
        return view('restaurant/document-view' ,compact('data'));
    }

    public function editDocument(Request $request , $id){
        if($request->isMethod('GET')){
            $data = RestaurantDocs::where('id' , $id)->first();
            return view('restaurant/document-edit' , compact('data'));
        }
        if($request->isMethod("POST")){
            $data = [
                'document_name' => $request->document_name,
                'file_type' => $request->file_type,
            ];


            if($request->hasFile('image')) {
               $file = $request->file('image');
               $filename = time() . '.' . $file->getClientOriginalExtension();
               // $file->move(storage_path()."/".env('CATEGORY_PATH'), $filename);
               $file->move(storage_path(). DIRECTORY_SEPARATOR . "app/public/restaurant/restaurant_docs" , $filename);
               $data["file"] = $filename;


                $qr_code_name = date('mdYHis') . uniqid() . '.png';
                $data['qr_code_name'] = $qr_code_name;
                // $is_created = RestaurantDocs::create($data);


                $scan_document_open = url('public/storage/restaurant/restaurant_docs').'/'.$filename;

                $img_store = storage_path() . '/'. env('RESTAURANT_DOC_QR_CODE') . '/' . $qr_code_name;
                $qr_code = \QrCode::format('png')
                             ->size(500)->errorCorrection('H')
                             ->generate($scan_document_open, $img_store);  
            } 



            $is_updated = RestaurantDocs::where('id' , $id)->update($data);

            if($is_updated){
                return redirect('restaurant/document-management')->with('success' , 'Document has been updated successfully.');
            }else{
                return back()->with('error' , 'Unable to edit document.');
            }
 

        }
    }


    public function deleteDocument(Request $request){
        $document_id = $request->delete_item_id;
        RestaurantDocs::whereId($document_id)->update(['deleted_at' => Carbon::now()]);
        Table::where('assign_document_id' , $document_id)->update(['assign_document_id' => null]);
        return redirect(route('restaurant.documentManagement'))->with('success' , 'Document has been deleted successfully.'); 
    }

    
			 
}   
