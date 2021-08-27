<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\ResponseController;
use Session;
use Artisan;
use Carbon\Carbon;
use DB;
use App\Validation;
use Redirect;
use Mail;
use Auth;
use App\BusinessModel\AdminBusiness;

header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);

class AuthenticateController extends ResponseController
{

  public function adminBusiness(){
		return new AdminBusiness();
  }
  
    public function login(Request $request){
      if($request->isMethod('GET')){
        if(Auth::guard('admin')->check()){
          return redirect(url('admin/dashboard'));
        } 
          return view('admin.login');
        }
  
        if($request->isMethod('POST')){
  
        $validator = $this->is_validationRuleWeb(Validation::adminValidationForLogin($Validation = "", $message = "") , $request);
  
              if(!empty($validator)){
                  return $validator;
              }
          $data = $request->all();
          $login = $this->adminBusiness()->login($data ,$request);
          if($login['status'] == "2"){
            Session::flash('danger', $login['error']);
            return redirect()->back();
          }else{
            Session::flash('message', $login['success']);
            return redirect(route('admin.dashboard'));
          }
  
        }	
    }


    public function logout(Request $request) {
      Auth::guard('admin')->logout();
      $request->session()->flush();
      $request->session()->regenerate();
      Session::flash('message', 'Logged out successfully.');
      return redirect(route("admin.login"));
    }



    public function forgotPassword(Request $request){
      if($request->isMethod('GET')){
        if(Auth::guard("admin")->check()){
                  return redirect(route('admin.dashboard'));
              }
          return view('admin.forgot-password');
        }
      if($request->isMethod('POST')){
  
        $validator = $this->is_validationRuleWeb(Validation::adminValidationForForgotPassword($Validation = "", $message = "") , $request);
  
              if(!empty($validator)){
                  return $validator;
              }
  
          $data = $request->all();
          $forgotPassword = $this->adminBusiness()->forgotPassword($data);
        if($forgotPassword['status'] == "1"){
            Session::flash('message', $forgotPassword['success']);
            return redirect()->back();
          }else{
          Session::flash('danger', $forgotPassword['error']);
            return redirect()->back();
          }
  
        }
  
    }


    public function feedbackReset(Request $request){
      $title   = "Password Reset Success";
      $message = " Your password has been reset successfully.";
      $type    = "success";
      return view("admin.email.feedback" , compact("title" , "message" , "type"));
    }

   public function linkExpired(Request $request){
      $title   = "Link Expired";
      $message = "Link has been expired.";
      $type    = "error";
      return view("admin.email.feedback" , compact("title" , "message" , "type"));
   }


    public function resetPassword(Request $request){
      if ($request->isMethod("GET")){
              $token = $request->token;
              $tokenData = DB::table('password_resets')
                          ->whereToken($token)->first();
  
              if(!$tokenData) {
                  return redirect("admin/link-expired");
              }
              if(Carbon::now() > Carbon::parse($tokenData->created_at)->addMinutes(10)){
                  return redirect("admin/link-expired")->with("error","Invalid token");
              }      
              return view("admin.reset-password");
          }
      if($request->isMethod("POST")){
        
        $validator = $this->is_validationRuleWeb(Validation::adminValidationForResetPassword($Validation = "", $message = "") , $request);
  
              if(!empty($validator)){
                  return $validator;
              }
              
        $token = $request->token;
        $data = $request->all();
        $resetPassword = $this->adminBusiness()->resetPassword($data,$token);
        if($resetPassword['status'] == "2"){
          Session::flash('danger', $resetPassword['error']);
            return redirect()->back();
        }else{
          Session::flash('message', $resetPassword['success']);
            return redirect(route('admin.feedbackReset'));
        }
      }
                
    }


        
    public function changePassword(Request $request){

      $admin_detail =  Auth::guard('admin')->user();
      if($request->isMethod('GET')){
          return view('admin.change-password');
      }
      
      if($request->isMethod('POST')){
  
              $validator = $this->is_validationRuleWeb(Validation::adminValidationForChangePassword($Validation = "", $message = "") , $request);
  
              if(!empty($validator)){
                  return $validator;
        }
  
        $admin_detail =  Auth::guard('admin')->user();
        $changePassword = $this->adminBusiness()->changePassword($request,$admin_detail);
  
        if($changePassword['status'] == "1"){
          Session::flash('message', $changePassword['success']);
          return redirect(route('admin.login'));
          }else{
          Session::flash('danger', $changePassword['error']);
            return redirect()->back();
          }
  
  
        }
      
    }



    public function myEarnings(){
        return view('admin.my-earnings');
    }


}
