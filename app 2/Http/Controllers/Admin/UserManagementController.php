<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\ResponseController;
use App\User;
use Session;
use Artisan;
use Carbon\Carbon;
use DB;
use Hash;
use App\Validation;
use App\BusinessModel\AdminUserBusinessModel;
header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);

class UserManagementController extends ResponseController
{

    public function AdminUserBusinessModel(){
		return new AdminUserBusinessModel();
    }
    
    public function userManagement(Request $request){

        
        if ($request->ajax()) {
            $users = $this->AdminUserBusinessModel()->userManagement($request);
            return response()->json($users);
        }

        if($request->isMethod('GET')){
          return view('admin.user-management');
        }
    }




    public function userDetails(Request $request,$user_id){
        $user_detail = $this->AdminUserBusinessModel()->userDetails($request,$user_id);
        return view('admin.user-details', compact('user_detail'));
    }


    public function editUser(Request $request,$user_id){
        if($request->isMethod('GET')){

            $user_find = $this->AdminUserBusinessModel()->editUser($request,$user_id);
            return view('admin.edit-user',compact('user_find'));
        }

        if($request->isMethod('POST')){
            $validator = $this->is_validationRuleWeb(Validation::adminValidationForEditUser($Validation = "", $message = "") , $request);
       
            if(!empty($validator)){
                return $validator;
            }

            $user_id = base64_decode($request->user_id);
            $data = $request->all();

            $isUpdated = $this->AdminUserBusinessModel()->updateUser($data,$user_id);
            if($isUpdated['status'] == "1"){
    			Session::flash('message', $isUpdated['success']);
    			return redirect(route('admin.userManagement'));
    		}else{
				Session::flash('danger', $isUpdated['error']);
    			return redirect()->back();
    		} 
        }
    }


    public function deleteUser(Request $request){

        $user_delete = $this->AdminUserBusinessModel()->deleteUser($request);
  
          if($user_delete['status'] == "1"){
              Session::flash('message', $user_delete['success']);
              return redirect()->back();
          }else{
              Session::flash('danger', $user_delete['error']);
              return redirect()->back();
          }
  
     }


     public function blockUser(Request $request){

        $blockUser = $this->AdminUserBusinessModel()->blockUser($request);
        if($blockUser['status'] == "1"){
            Session::flash('message', $blockUser['success']);
            return redirect()->back();
        }else{
            Session::flash('danger', $blockUser['error']);
            return redirect()->back();
        } 
    }

    public function userUnblock(Request $request,$user_id){
        $userUnblock = $this->AdminUserBusinessModel()->userUnblock($request,$user_id);
        if($userUnblock['status'] == "1"){
            Session::flash('message', $userUnblock['success']);
            return redirect()->back();
        }else{
            Session::flash('danger', $userUnblock['error']);
            return redirect()->back();
        } 
    }


    
    public function orders(Request $request,$id){
        $user_id = base64_decode($id);

        Session::put('order_user_id' , $user_id);

        $orders_find = $this->AdminUserBusinessModel()->orders($user_id);

        return view('admin.orders',compact('user_id','orders_find'));
    }

    public function userOrderDetails(Request $request,$order_id){
        $user_order_detail = $this->AdminUserBusinessModel()->userOrderDetails($request,$order_id);

        $user_id = Session::get('order_user_id');

        return view('admin.user-order-details',compact('user_id'));
    }
}
