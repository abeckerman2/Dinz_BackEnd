<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\RestaurantImage;
use Auth;
use Hash;
use App\BusinessModel\RestaurantBusinessModel;

class SettingController extends Controller
{

    public function RestaurantBusinessModel(){
        return new RestaurantBusinessModel();
    }


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


    public function profile(Request $request){
        $restaurant_id =  Auth::guard('restaurant')->user()->id;
        $data = Restaurant::where('id' , $restaurant_id)->with('restaurantImages')->first();
        return view('restaurant.profile', compact('data'));
    }

    public function editProfile(Request $request){
        if($request->isMethod('GET')){
            $restaurant_id =  Auth::guard('restaurant')->user()->id;
            $data = Restaurant::where('id' , $restaurant_id)->with('restaurantImages')->first();
            return view('restaurant.edit-profile' , compact('data'));
        }
        if($request->isMethod('POST')){
            
            $restaurant_id =  Auth::guard('restaurant')->user()->id;

            $data = [
                'owner_name'         => $request->owner_name,
                'restaurant_name'    => $request->restaurant_name,
                'phone_number'       => $request->phone_number,
                'email'              => $request->email_address,
                'restaurant_address' => $request->restaurant_address,
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
                                    $added = $this->RestaurantBusinessModel()->addImages($insert_data);
                                }             
                            }
                        } 
                    }
                }

            // $is_updated = Restaurant::where('id' , $restaurant_id)->update($data);
            $is_updated = $this->RestaurantBusinessModel()->updateRestaurant($where,$data);


            if($is_updated){
                return redirect('restaurant/profile')->with('success','Profile has been updated successfully.');
            }else{
                return back()->with('error' , 'Unable to update profile.');
            }
        }
    }




    public function checkEmailExistEdit(Request $request) {
        $email_address = $request->email_address;
        if($email_address){
            $id = Auth::guard('restaurant')->user()->id;
            if($id) {
                $where = [['email',$email_address],['id','!=', $id]];
                // $checkUser = $this->RestaurantProfileModel()->checkParkCeoEmail($where);
                $checkUser = Restaurant::where($where)->first();
                if($checkUser) {
                    echo(json_encode("Email address already exist.")); 
                } else {
                    echo(json_encode(true)); 
                }
            } else {
                echo(json_encode(true));
            }            
        }
    }

    public function checkPhoneNumberExistEdit(Request $request) {
        $phone_number = $request->phone_number;
        if($phone_number){
            $id = Auth::guard('restaurant')->user()->id;
            if($id) {
                $where = [['phone_number',$phone_number],['id','!=', $id]];
                // $checkUser = $this->RestaurantProfileModel()->checkParkCeoEmail($where);
                $checkUser = Restaurant::where($where)->first();
                if($checkUser) {
                    echo(json_encode("Phone number already exist.")); 
                } else {
                    echo(json_encode(true)); 
                }
            } else {
                echo(json_encode(true));
            }            
        }

    }

    public function changePassword(Request $request){
        if($request->isMethod('GET')){
            return view('restaurant/change_password');
        }
        if($request->isMethod('POST')){
            $user_detail = Auth::guard('restaurant')->user();   

            $password = $request->password;
            if(Hash::check($password , $user_detail->password)){
                $data = [
                    'password' => Hash::make($request->new_password),
                ];

                $is_updated = Restaurant::where('id' , $user_detail->id)->update($data);

                if($is_updated){
                    $request->session()->flush();
                    $request->session()->regenerate();
                    return redirect('restaurant/login')->with('success' , "Password changed successfully.");
                }else{
                    return back()->with('error' , 'Unable to change password');
                }
            }else{
                return back()->with('error' , 'Old password is incorrect.');
            }
        }
    }


    public function myEarnings(Request $request){
        return view('restaurant.my-earnings');
    }

    public function addOpenCloseTime(Request $request){
        return view('restaurant.add-open-close-time');
    }

    public function contactUs(Request $request){
        return view('restaurant.contact-us');
    }

    public function aboutUs(Request $request){
        return view('restaurant.about-us');
    }
    
    public function termsConditions(Request $request){
        return view('restaurant.terms-conditions');
    }

    public function addRestroTime(Request $request){
        return view('restaurant.add-restro-time');
    }

    public function editRestroTime(Request $request){
        return view('restaurant.edit-restro-time');
    }
}
