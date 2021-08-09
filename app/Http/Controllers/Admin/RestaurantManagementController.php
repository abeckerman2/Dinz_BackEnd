<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\ResponseController;
use App\User;
use App\Restaurant;
use App\RestaurantImage;
use Session;
use Artisan;
use Carbon\Carbon;
use DB;
use Hash;
use App\Validation;
use App\BusinessModel\AdminRestaurantBusinessModel;

use Mail;
use App\Mail\RestaurantAcceptMail;
use App\Mail\RestaurantRejectMail;


header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);

class RestaurantManagementController extends ResponseController
{

    private function parseFiles($request,$inputFiles){
      $images = $request->file($inputFiles);
  
        /* remove not acceptable images*/
        if($images && !empty($images)){
          $not_accept = array();
          $non_acceptable = $request->get("non_acceptable_files");

          if($non_acceptable && !empty($non_acceptable)){
            $exp = explode(",",$non_acceptable);
            $exp = array_filter($exp);
            $not_accept = array_values($exp);
          }
          
          for($w = 0;$w < count($not_accept);$w++){
            $val = $not_accept[$w];
            if(isset($images[$val[0]][$val[2]])){
              unset($images[$val[0]][$val[2]]);
            }
          }


        
          $images = array_filter($images);
          $images = array_values($images);

          $images = array_map(function($x){ return array_values($x); }, $images);
        }
        return $images;
    }

    public static function multipleImageUpload($request_profile, String $dir = "/app/public/restaurant/restaurant_images", $multiple = false) {
        $return_data = "";
        $profile = null;
        if ($multiple) {
            $profile = $request_profile;
        } else if ($request_profile->hasFile("media")) {
            $profile = $request_profile->file("media");
        }

        if ($profile) {
            $path = storage_path() . $dir;
            $file_name = $profile->getClientOriginalName();
            $file_name = uniqid() . "_" . $file_name;
            $file_name = str_replace(array(
                " ",
                "(",
                ")"
            ) , "", $file_name);
            if (!file_exists($path)) {
                mkdir(url($dir));
            }

            $profile->move($path, $file_name);
            $return_data = $file_name;
        }
        return $return_data;
    }


    public function AdminRestaurantBusinessModel(){
		return new AdminRestaurantBusinessModel();
    }

    public function restaurantManagement(Request $request){
        $restaurants = $this->AdminRestaurantBusinessModel()->restaurantManagement($request);
        return view('admin.restaurant-management',compact('restaurants'));
    }


    public function restaurantDetails(Request $request , $restaurant_id){
        $request_restaurant_detail = $this->AdminRestaurantBusinessModel()->requestRestaurantDetails($request,$restaurant_id);
        return view('admin.restaurant-details',compact('request_restaurant_detail'));
    }


    public function approvedRestaurant(Request $request){
        $approved_restaurants = $this->AdminRestaurantBusinessModel()->approvedRestaurant($request);
        return view('admin.restaurant-approved',compact('approved_restaurants'));
    }

    public function blockRestaurant(Request $request){

        $block_restaurant = $this->AdminRestaurantBusinessModel()->blockRestaurant($request);
        if($block_restaurant['status'] == "1"){
            Session::flash('message', $block_restaurant['success']);
            return redirect()->back();
        }else{
            Session::flash('danger', $block_restaurant['error']);
            return redirect()->back();
        } 
    }

    public function restaurantUnblock(Request $request,$user_id){
        $restaurant_unblock = $this->AdminRestaurantBusinessModel()->restaurantUnblock($request,$user_id);
        if($restaurant_unblock['status'] == "1"){
            Session::flash('message', $restaurant_unblock['success']);
            return redirect()->back();
        }else{
            Session::flash('danger', $restaurant_unblock['error']);
            return redirect()->back();
        } 
    }

    public function deleteApprovedRestaurant(Request $request){

        $restaurant_delete = $this->AdminRestaurantBusinessModel()->deleteApprovedRestaurant($request);
  
          if($restaurant_delete['status'] == "1"){
              Session::flash('message', $restaurant_delete['success']);
              return redirect()->back();
          }else{
              Session::flash('danger', $restaurant_delete['error']);
              return redirect()->back();
          }
  
     }


    // public function editRestaurant(Request $request ,$restaurant_id){
    //     if($request->isMethod('GET')){
    //         $restaurant_find = $this->AdminRestaurantBusinessModel()->editRestaurant($request,$restaurant_id);
    //         return view('admin.edit-restaurant',compact('restaurant_find'));
    //     }
    //     $restaurant_id = base64_decode($restaurant_id);
    //     if($request->isMethod('POST')){

    //         $data = $request->all();

    //         if($request->hasFile('restaurant_logo')) {
    //             $file = $request->file('restaurant_logo');
    //             $filename = time() . '.' . $file->getClientOriginalExtension();
    //             $file->move(storage_path(). DIRECTORY_SEPARATOR . "app/public/restaurant/restaurant_logo" , $filename);
    //             $data["restaurant_logo"] = $filename;
    //          }   

    //          $where = [
    //             'id' => $restaurant_id,
    //     ];

    //     $image_id = explode(",",$request->delete_images);
    //     RestaurantImage::whereIn('id', $image_id)->delete();
        
    //     RestaurantImage::whereIn('id', $image_id)->delete();    


    //         $images = $this->parseFiles($request,"images");

    //             if($images){
    //                 $all_media = array();
    //                 $len = count($images);
    //                 $j = 1; 
    //                 if($len > 0){
    //                     $j = 0;
    //                     for($i = 0;$i < $len;$i++){
    //                         if(isset($images[$i])){
    //                             $cnt_img = count($images[$i]);
    //                             for($k = 0; $k < $cnt_img;$k++){
    //                                 $file = $this->multipleImageUpload($images[$i][$k],"/app/public/restaurant/restaurant_images", 1);

    //                                 $insert_data = array();
    //                                 $insert_data["restaurant_id"] = $restaurant_id;
    //                                 $insert_data["restaurant_image"] = $file;
    //                                 $added = $this->AdminRestaurantBusinessModel()->addImages($insert_data);
    //                             }             
    //                         }
    //                     } 
    //                 }
    //             }

            
           
    
    //         $isUpdated = $this->AdminRestaurantBusinessModel()->updateRestaurant($data,$restaurant_id,$where);
    //         if($isUpdated['status'] == "1"){
    // 			Session::flash('message', $isUpdated['success']);
    // 			return redirect(route('admin.approvedRestaurant'));
    // 		}else{
				// Session::flash('danger', $isUpdated['error']);
    // 			return redirect()->back();
    // 		} 

    //     }

    // }
     public function editRestaurant(Request $request , $restaurant_id){
        if($request->isMethod('GET')){
            $restaurant_id =  $restaurant_id;
            $restaurant_find = Restaurant::where('id' , base64_decode($restaurant_id))->with('restaurantImages')->first();

            return view('admin.edit-restaurant' , compact('restaurant_find' ));
        }
        if($request->isMethod('POST')){
            
            $restaurant_id =  base64_decode($restaurant_id);

            $country_code = str_replace("+", "", $request->country_code);

            $data = [
                'first_name'         => $request->first_name,
                'last_name'          => $request->last_name,
                'restaurant_name'    => $request->restaurant_name,
                'country_code'       => $country_code,
                'phone_number'       => $request->phone_number,
                'email'              => $request->email,
                'restaurant_address' => $request->restaurant_address,
                'city'               => $request->city,
                'lat'                => $request->lat,
                'lon'                => $request->lon,
                'description'        => $request->description,
            ];

            if($request->hasFile('restaurant_logo')) {
               $file = $request->file('restaurant_logo');
               $filename = time() . '.' . $file->getClientOriginalExtension();
               $file->move(storage_path(). DIRECTORY_SEPARATOR . "app/public/restaurant/restaurant_logo" , $filename);
               $data["restaurant_logo"] = $filename;
            }   



            $where = [
                    'id' => $restaurant_id,
            ];

            $image_id = explode(",",$request->delete_images);
            RestaurantImage::whereIn('id', $image_id)->delete();    


            $images = $this->parseFiles($request,"images");

                if($images){
                    $all_media = array();
                    $len = count($images);
                    $j = 1; 
                    if($len > 0){
                        $j = 0;
                        for($i = 0;$i < $len;$i++){
                            if(isset($images[$i])){
                                $cnt_img = count($images[$i]);
                                for($k = 0; $k < $cnt_img;$k++){
                                    $file = $this->multipleImageUpload($images[$i][$k],"/app/public/restaurant/restaurant_images", 1);

                                    $insert_data = array();
                                    $insert_data["restaurant_id"] = $restaurant_id;
                                    $insert_data["restaurant_image"] = $file;
                                    // $added = $this->RestaurantBusinessModel()->addImages($insert_data);
                                    $added = RestaurantImage::create($insert_data);
                                }             
                            }
                        } 
                    }
                }

            $is_updated = Restaurant::where('id' , $restaurant_id)->update($data);


            if($is_updated){
                return redirect('admin/restaurant-approved')->with('success','Restaurant details has been updated successfully.');
            }else{
                return back()->with('error' , 'Unable to edit restaurant.');
            }
        }
    }



    
    public function rejectedRestaurant(Request $request){
        $rejected_restaurants = $this->AdminRestaurantBusinessModel()->rejectedRestaurant($request);
        return view('admin.restaurant-rejected',compact('rejected_restaurants'));
    }

    public function rejectedRestaurantDetails(Request $request, $restaurant_id){
        $reject_restaurant_detail = $this->AdminRestaurantBusinessModel()->rejectedRestaurantDetails($request,$restaurant_id);
        return view('admin.restaurant-rejected-details',compact('reject_restaurant_detail'));
    }


    public function acceptApproved(Request $request){
            $IsApproved = Restaurant::whereId($request->restaurant_id)->update(['is_approved' => 1]);

            if($IsApproved){
                return "1";
            }else{
                return "0";
            }
    }

    public function reject(Request $request){
        $IsRejected = Restaurant::whereId($request->restaurant_id)->update(['is_approved' => 2]);

            if($IsRejected){
                return "1";
            }else{
                return "0";
            }

    }


    public function checkEmailExistEdit(Request $request ,$rest_id) {
        $email_address = $request->email;
        if($email_address){
            $restaurant_find = Restaurant::whereId($rest_id)->first();

            if($restaurant_find) {
                $where = [['email',$email_address],['id','!=', $rest_id]];
                $checkRestaurant = Restaurant::where($where)->first();
                if($checkRestaurant) {
                    echo(json_encode("Email address already exist.")); 
                } else {
                    echo(json_encode(true)); 
                }
            } else {
                echo(json_encode(true));
            }            
        }
    }


    public function checkPhoneNumberExistEdit(Request $request ,$rest_id) {
        $phone_number = $request->phone_number;
        if($phone_number){
            $restaurant_find = Restaurant::whereId($rest_id)->first();
            if($restaurant_find) {
                $where = [['phone_number',$phone_number],['id','!=', $rest_id]];
                $checkRestaurant = Restaurant::where($where)->first();
                if($checkRestaurant) {
                    echo(json_encode("Phone number already exist.")); 
                } else {
                    echo(json_encode(true)); 
                }
            } else {
                echo(json_encode(true));
            }            
        }
    }


    public function acceptRestaurant(Request $request , $id){

        $restaurant_details = Restaurant::where('id' , $id)->first();

        
        Mail::to($restaurant_details->email)->send(new RestaurantAcceptMail($restaurant_details));

        Restaurant::where('id' , $id)->update(['is_approved' => 1]);
        return redirect('admin/restaurant-management')->with('success' , "Restaurant has been approved sucessfully.");
    }

    public function rejectRestaurant(Request $request , $id){

        $restaurant_details = Restaurant::where('id' , $id)->first();

        Mail::to($restaurant_details->email)->send(new RestaurantRejectMail($restaurant_details));

        Restaurant::where('id' , $id)->update(['is_approved' => 2]);
        return redirect('admin/restaurant-management')->with('error' , "Restaurant has been rejected sucessfully.");
    }


    public function approvedRestaurantDetails(Request $request , $id){
        $approved_restaurant_detail = Restaurant::where('id' , base64_decode($id))->with('restaurantImages')->first();
        return view('admin/approved-restaurant-details' , compact('approved_restaurant_detail'));
    }


    public function deleterejectedRestaurant(Request $request){
        $restaurant_id = $request->class_id;
        Restaurant::where('id', $restaurant_id)->update(['deleted_at' => Carbon::now()]);
        return redirect('admin/restaurant-rejected')->with('success' , "Restaurant has been deleted successfully.");
    }

}
