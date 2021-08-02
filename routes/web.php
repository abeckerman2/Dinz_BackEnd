<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/abc', function () {
    return view('welcome');
});


Route::get('/abc', function () {
    return view('welcome');
});


Route::get('/queue-work', function() {
   $exitCode = Artisan::call('queue:work');
    return 'queue-work';
});

Route::get('/cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'cache cleared';
});

Route::get('/route', function() {
    $exitCode = Artisan::call('route:clear');
    return 'route cleared';
});

Route::get('/configgg', function() {
	
    $exitCode = Artisan::call('config:clear');
    return 'config cleared';
});

Route::get('/view', function() {
    $exitCode = Artisan::call('view:clear');
    return 'view cleared';
});

Route::get('/link', function() {
    $exitCode = Artisan::call('storage:link');
    return 'link cleared';
});


Route::get('listen', function() {
    return Artisan::call('queue:listen');
});


/* USER APP URL*/
Route::get('password-reset-success','Api\v1\AuthenticationController@viewMessageResetPassword')->name('passwordReset');
Route::get('password-reset-invalid','Api\v1\AuthenticationController@viewMessageResetPasswordInvalid')->name('passwordResetInvalid');
Route::get('confirm-account/{verify_email_token?}','Api\v1\AuthenticationController@confirmAccount')->name('confirmAccount');
Route::match(['GET','POST'],'reset-password/{reset_password_token?}','Api\v1\AuthenticationController@resetPassword')->name('userResetPassword');

/*END USER APP URL*/





/*Restaurant panel*/
Route::group(['namespace' => 'Restaurant','prefix'=>'/restaurant', 'as' => 'restaurant.'],function(){


    Route::post('check-exist-email-user','ProfileController@checkExistEmailUser')->name('checkExistEmailUser');
    Route::post('check-exist-phone-number-user','ProfileController@checkExistPhoneNumberUser')->name('checkExistPhoneNumberUser');

    Route::get('check-exist-email-user-edit','SettingController@checkEmailExistEdit')->name('checkEmailExistEdit');
    Route::get('check-exist-phone-number-user-edit','SettingController@checkPhoneNumberExistEdit')->name('checkPhoneNumberExistEdit');


    Route::match(['GET','POST'],'create-restaurant','ProfileController@createRestaurant')->name('createRestaurant')->middleware('LoginCheckForReturnDashboard');
    Route::match(['GET','POST'],'login','ProfileController@login')->name('login')->middleware('LoginCheckForReturnDashboard');
    Route::match(['GET','POST'],'forgot-password','ProfileController@forgotPassword')->name('forgotPassword')->middleware('LoginCheckForReturnDashboard');
    Route::match(['GET','POST'],'reset-password/{token}','ProfileController@resetPassword')->name('resetPassword');
    Route::match(["GET","POST"],"feedbackReset","ProfileController@feedbackReset");
    Route::match(["GET","POST"],"link-expired","ProfileController@linkExpired");

    Route::group(['middleware' => 'check_user'] , function(){

        Route::match(['GET' , 'POST'] , 'change-password' , 'SettingController@changePassword')->name('changePassword');

        Route::post('avail-unavail','MenuManagementController@availUnavail')->name('availUnavail');
        Route::post('occupied-unoccupied','TableManagementController@occupiedunoccupied')->name('occupiedunoccupied');
        Route::post('delete-item','MenuManagementController@deleteItem')->name('deleteItem');

        Route::match(['GET', 'POST'] , 'logout' , 'ProfileController@logout')->name('logout');
        Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
        Route::match(['GET','POST'],'table-management','TableManagementController@tableManagement')->name('tableManagement');
        Route::match(['GET','POST'],'create-table','TableManagementController@createTable')->name('createTable');
        Route::match(['GET','POST'],'table-details/{table_id}','TableManagementController@tableDetails')->name('tableDetails');
        Route::match(['GET','POST'],'menu-management','MenuManagementController@menuManagement')->name('menuManagement');
        Route::match(['GET','POST'],'add-item','MenuManagementController@addItem')->name('addItem');
        Route::match(['GET','POST'],'edit-item/{menu_id}','MenuManagementController@editItem')->name('editItem');
        Route::match(['GET','POST'],'order-management','OrderManagementController@orderManagement')->name('orderManagement');
        Route::match(['GET','POST'],'present-order-details','OrderManagementController@presentOrderDetails')->name('presentOrderDetails');
        Route::match(['GET','POST'],'present-order-edit','OrderManagementController@presentOrderEdit')->name('presentOrderEdit');
        Route::match(['GET','POST'],'create-order','OrderManagementController@createOrder')->name('createOrder');
        Route::match(['GET','POST'],'past-orders','OrderManagementController@pastOrders')->name('pastOrders');
        Route::match(['GET','POST'],'past-order-details','OrderManagementController@pastOrderDetails')->name('pastOrderDetails');
        Route::match(['GET','POST'],'today-orders','OrderManagementController@todayOrders')->name('todayOrders');
        Route::match(['GET','POST'],'today-order-details','OrderManagementController@todayOrderDetails')->name('todayOrderDetails');
        Route::match(['GET','POST'],'profile','SettingController@profile')->name('profile');
        Route::match(['GET','POST'],'edit-profile','SettingController@editProfile')->name('editProfile');
        Route::match(['GET','POST'],'my-earnings','SettingController@myEarnings')->name('myEarnings');
        Route::match(['GET','POST'],'add-open-close-time','SettingController@addOpenCloseTime')->name('addOpenCloseTime');
        Route::match(['GET','POST'],'contact-us','SettingController@contactUs')->name('contactUs');
        Route::match(['GET','POST'],'about-us','SettingController@aboutUs')->name('aboutUs');
        Route::match(['GET','POST'],'terms-conditions','SettingController@termsConditions')->name('termsConditions');
        Route::match(['GET','POST'],'add-restro-time','SettingController@addRestroTime')->name('addRestroTime');
        Route::match(['GET','POST'],'edit-restro-time','SettingController@editRestroTime')->name('editRestroTime');

    });

});


/*ADMIN ROUTE*/
Route::group(['namespace' => 'Admin','prefix'=>'/admin', 'as' => 'admin.'],function(){


    Route::match(['GET','POST'],'login', 'AuthenticateController@login')->name('login');
    Route::match(['GET','POST'],'forgot-password', 'AuthenticateController@forgotPassword')->name('forgotPassword');
    Route::match(['GET' , 'POST'] , 'reset-password/{token}' , 'AuthenticateController@resetPassword')->name('resetPassword');
    Route::match(["GET","POST"],"feedbackReset","AuthenticateController@feedbackReset")->name('feedbackReset');
    Route::match(["GET","POST"],"link-expired","AuthenticateController@linkExpired")->name('linkExpired');
    

    Route::group(['middleware'=>['CheckAdmin']] , function() {

        Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
        Route::get('user-management','UserManagementController@userManagement')->name('userManagement');
        Route::match(['GET' , 'POST'] ,'user-details/{user_id}','UserManagementController@userDetails')->name('userDetails');
        Route::match(['GET' , 'POST'] ,'orders/{user_id}','UserManagementController@orders')->name('orders');
        Route::match(['GET' , 'POST'] ,'user-order-details/{user_id}','UserManagementController@userOrderDetails')->name('userOrderDetails');
        Route::match(['GET' , 'POST'] ,'edit-user/{user_id}','UserManagementController@editUser')->name('editUser');
        Route::match(['GET' , 'POST'] ,'delete-user','UserManagementController@deleteUser')->name('deleteUser');
        Route::post('block-user','UserManagementController@blockUser')->name('blockUser');
        Route::match(['GET' , 'POST'] ,'user-unblock/{user_id}','UserManagementController@userUnblock')->name('userUnblock');
        Route::get('restaurant-management','RestaurantManagementController@restaurantManagement')->name('restaurantManagement');
        Route::get('restaurant-details','RestaurantManagementController@restaurantDetails')->name('restaurantDetails');
        Route::get('restaurant-approved','RestaurantManagementController@approvedRestaurant')->name('approvedRestaurant');
        Route::get('edit-restaurant','RestaurantManagementController@editRestaurant')->name('editRestaurant');
        Route::get('restaurant-rejected','RestaurantManagementController@rejectedRestaurant')->name('rejectedRestaurant');
        Route::get('restaurant-rejected-details','RestaurantManagementController@rejectedRestaurantDetails')->name('rejectedRestaurantDetails');
        Route::get('order-management','OrderManagementController@orderManagement')->name('orderManagement');
        Route::get('order-details','OrderManagementController@orderDetails')->name('orderDetails');
        Route::get('edit-order','OrderManagementController@editOrder')->name('editOrder');
        Route::match(['GET','POST'],'my-earnings', 'AuthenticateController@myEarnings')->name('myEarnings');
        Route::match(['GET','POST'],'change-password', 'AuthenticateController@changePassword')->name('changePassword');
        Route::match(['GET' , 'POST'] , 'logout' , 'AuthenticateController@logout')->name('logout');
        
        
    }); 
           
});

/*END OF ADMIN ROUTE*/
