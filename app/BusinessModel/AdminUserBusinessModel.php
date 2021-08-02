<?php

namespace App\BusinessModel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\User;
use Hash;
use DB;
use Mail;
use Carbon\Carbon;
use App\Mail\BlockUserMail;
use App\Mail\ForgotAdminPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminUserBusinessModel extends Model
{

    public function userManagement($request){

        $column = "id";
        $asc_desc = $request->get("order")[0]['dir'];
         
         if($asc_desc == "asc"){
             $asc_desc = "desc";
         }else{
             $asc_desc = "asc";
         }

         $order =$request->get("order")[0]['column'];
         if($order == 1){
            $column = "user_name";
         }elseif ($order == 2) {
            $column = "email";
         }else{
            $column = "id";
         }


        $data = User::select("*",DB::raw('CONCAT(users.first_name, " ", users.last_name) AS user_name'))
                ->whereDeletedAt(null)
                ->orderBy($column,$asc_desc);
    
        $total = $data->get()->count();

        $search = $request->get("search")["value"];
        $filter = $total;

        if($search){
            $data  = $data->where(function($query) use($search){
                        $query->where('id', 'Like', '%'. $search . '%')
                            ->orWhere('email', 'Like', '%' . $search . '%')
                            ->orWhere(DB::raw('CONCAT(users.first_name, " ", users.last_name)'), 'Like', '%' . $search . '%');
                    });
            
            $filter = $data->get()->count();
                            
        }

        $data = $data->offset($request->start);
        $data = $data->take($request->length);
        $data = $data->get();

        $start_from = $request->start;
        if($start_from == 0){
            $start_from  = 1;
        }
        if($start_from % 10 == 0){
            $start_from = $start_from + 1;
        }

        foreach ($data as $k => $user_detail) {

              $view_user = url('admin/user-details').'/'.base64_encode($user_detail->id);
              $edit_user = url('admin/edit-user').'/'.base64_encode($user_detail->id);
              $unblock_user = url('admin/user-unblock').'/'.base64_encode($user_detail->id);
              $user_id = $user_detail->id;
            
               $btn = " ";

               $btn .= '<a href="'.$view_user.'" class="view">View</a>';
               $btn .=  '<a href="'.$edit_user.'" class="view">Edit</a>';
               $btn .=  '<a  href="javascript:void(0);" data-id = "'.$user_id.'"  class="view action" >Delete</a>';
               if($user_detail->is_block == 0){
               $btn .=  '<a href="javascript:void(0);" class="view red" id="block_user" ui="'.$user_id.'" data-toggle="modal" >Block</a>';
               }else{
                   $btn .=  '<a href="'.$unblock_user.'" class="view">Unblock</a>';
               }

                $user_detail->action = $btn;
                $user_detail->DT_RowIndex = $start_from++;
        }

            $return_data = [
                    "data" => $data,
                    "draw" => (int)$request->draw,
                    "recordsTotal" => $total,
                    "recordsFiltered" => $filter,
                    "input" => $request->all()
            ];
            return $return_data;      
    }



    public function userDetails($request,$user_id){
        $user_id = base64_decode($request->user_id);
        $user_detail = User::whereId($user_id)->first();
        return $user_detail;
    }

    public function editUser($request,$user_id){

        $user_id = base64_decode($request->user_id);
        $user_find = User::whereId($user_id)->first();
        return $user_find;
    }

    public function updateUser($data,$user_id){
        $user_find = User::whereId($user_id)->first();
        $user_find->fill($data);
        $isUpdated = $user_find->update();
        if(!empty($isUpdated)){

            return ['status' => "1", 'success' => "User details has been updated successfully."];
            
        }else{

            return ['status' => "2", 'error' => "User details not updated."];

        }      
    }


    public function deleteUser($request){

        $user_id = $request->class_id;
        $user_delete = User::whereId($user_id)->first();
        $user_delete->deleted_at = Carbon::now();
        $deleteUser = $user_delete->update();

        if(!empty($deleteUser)){
            return ['status' => "1", 'success' => "User has been deleted successfully."];          
        }else{
            return ['status' => "2", 'error' => "Unable to delete user."];   
        }

    }


    public function blockUser($request){
        $user_block = User::whereId($request->user_block_id)->first();
        
        $text_message = $request->text_message;

        try{
            \Mail::to($user_block->email)->send(new BlockUserMail($user_block,$text_message));
        }catch(\Exception $ex){
            return ['status' => "2", 'error' => "something went wrong."];
        }

        $user_block->is_block = 1;
        $blockUser = $user_block->update();

        if(!empty($blockUser)){
            return ['status' => "1", 'success' => "User has been blocked successfully."];          
        }else{
            return ['status' => "2", 'error' => "Something went wrong."];   
        }
    }


    public function userUnblock($request,$user_id){
        $user_id = base64_decode($request->user_id);
        $user_unblock = User::whereId($user_id)->first();
        $user_unblock->is_block = 0;
        $userUnblock = $user_unblock->update();

        if(!empty($userUnblock)){
            return ['status' => "1", 'success' => "User has been unblocked successfully."];          
        }else{
            return ['status' => "2", 'error' => "Something went wrong."];   
        }

    }

}