<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{

	//App User Athuntication Validation
    public static function userAppRegister($validation = null, $message = null){

    	$validation = [

            'first_name'    => 'required|max:50',
    		    'last_name'     => 'required|max:50',
            'email'        	=> 'required|max:100|unique:users,email',
            'password'     	=> ['required',
                                'max:100',
                                'min:8']
    	];

    	$message = [
              'first_name.required'         =>  "Please enter first name.",
              'last_name.required'          =>  "Please enter last name.",
              'email.required'              =>  "Please enter email.",
              'email.unique'                =>  "Email already exists.",
              'password.required'           =>  "Please enter password.",
              'password.min'                =>  "Password must be at 8 characters long.",
    	];

    	return $data = ['validation' => $validation, 'message' => $message];

    }

    public static function userAppLogin($validation = null, $message = null){


        $validation = [
            'email'         => 'required',
            'password'     	=> 'required',
            'device_type'   => 'required|in:Ios,Android',  //I=>IOS, A=>Android
            'device_token'  => 'required',
           
        ];
        
        $message = [
            'email.required'                => 'Please enter email.',
            'password.required'             => 'Please enter password.',
            'device_type.required'          => 'Please enter device type.',
            'device_token.required'         => 'Please enter device token.',
             
        ];

        return $data = ['validation' => $validation, 'message' => $message];
    }

    
    public static function userAppForgot($validation = null, $message = null){


        $validation =  [
            'email' => 'required|email|exists:users,email'
        ];

        $message = [
            'email.required'    => 'Please enter email address.',
            'email.email'       => 'Please enter valid email address.',
            'email.exists'      => 'Please enter registered email address.'
        ];

        return $data = ['validation' => $validation, 'message' => $message];

    }

    public static function userAppChangePassword($validation = null, $message = null){
        $validation =  [
            'old_password'              =>      'required',
            'new_password'              =>      ['required',
                                                'max:100',
                                                'min:8']
        ];

        $message = [
            'password.required'                 => 'Please enter old password.',
            'new_password.required'             => 'Please enter new password.',
            'new_password.min'                  =>  "New Password must be at 8 characters long.",
            'new_password.regex'                =>  "New Password must have at least 1 upper case character and 1 lower case character and 1 special character."
        ];
        
        return $data = ['validation' => $validation, 'message' => $message];

    }

    public static  function userAppReset($validation = null, $message = null){

        $validation =  [
            'password'          => ['required',
                                    'max:100',
                                    'min:8'],
            'confirm_password'  => 'required|same:password',
         ];

         $message = [
             'password.required'          => 'Please enter new password.',
             'password.min'               =>  "New Password must be at 8 characters long.",
             'password.regex'             =>  "New Password must have at least 1 upper case character and 1 lower case character and 1 special character.",
             'confirm_password.required'  => 'Please enter confirm password.',
             'confirm_password.same'      => 'New password and confirm password must be same.',
             'password.min'               => 'The new password must be at least 6 characters.',
             'password.max'               => 'The new password may not be greater than 100 characters.'
        ];
        
        return $data = ['validation' => $validation, 'message' => $message];

    }

    public static function userAppUpdateUser($validation = null, $message = null, $user_id){


      $validation = [

            'first_name'    => 'required|max:50',
            'last_name'     => 'required|max:50',
            'email'         => 'required|max:100|unique:users,email,'.$user_id.',id'
      ];

      $message = [
              'first_name.required'         =>  "Please enter first name.",
              'last_name.required'          =>  "Please enter last name.",
              'email.required'              =>  "Please enter email.",
              'email.unique'                =>  "Email already exists."
      ];

      return $data = ['validation' => $validation, 'message' => $message];

    }


    //###########################----------Admin Validations--------------------------####################//

    public static function adminValidationForForgotPassword($validation = null, $message = null){

        $validation = [
          'email'  =>  'required',  
        ];
        $message = [
          'email.required'  => '* Please enter email address.',  
        ];
        return $data = ['validation' => $validation, 'message' => $message];
      }
  
      public static function adminValidationForLogin($validation = null, $message = null){
  
        $validation = [
          'email'  =>  'required', 
          'password'  =>  'required', 
        ];
        $message = [
          'email.required'  => '* Please enter email address.', 
          'password.required'  => '* Please enter password.', 
        ];
        return $data = ['validation' => $validation, 'message' => $message];
      }

      public static function adminValidationForChangePassword($validation = null, $message = null){

        $validation = [
          'old_password'  =>  'required', 
          'new_password'  =>  'required', 
          'confirm_password'  =>  'required', 
        ];
        $message = [
          'old_password.required'  => '* Please enter old password.', 
          'new_password.required'  => '* Please enter new password.',
          'confirm_password.required'  => '* Please confirm password.', 
        ];
        return $data = ['validation' => $validation, 'message' => $message];
      }

      public static function adminValidationForResetPassword($validation = null, $message = null){

        $validation = [ 
          'new_password'  =>  'required', 
          'confirm_password'  =>  'required', 
        ];
        $message = [ 
          'new_password.required'  => '* Please enter new password.',
          'confirm_password.required'  => '* Please confirm new password.', 
        ];
        return $data = ['validation' => $validation, 'message' => $message];
      }


      public static function adminValidationForEditUser($validation = null, $message = null){

        $validation = [ 
          'first_name'  =>  'required|max:50', 
          'last_name'  =>  'required|max:50',
          'email'  =>  'required', 
        ];
        $message = [ 
          'first_name.required'  => '* Please enter first name.',
          'first_name.max'       =>  '* First name should be less than 50 characters.',
          'last_name.required'  => '* Please enter last name.',
          'last_name.max'       =>  '* Last name should be less than 50 characters.',
          'email.required'  => '* Please enter email address.', 
        ];
        return $data = ['validation' => $validation, 'message' => $message];
      }
      

}

