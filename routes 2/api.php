<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    
    
  
Route::group(['namespace' => 'Api\v1','prefix'=>'v1'], function() {

    Route::post('register', 'AuthenticationController@register');
    Route::post('login', 'AuthenticationController@login'); 
    Route::post('forgot-password','AuthenticationController@forgotPassword');
    
    Route::group(['middleware' => 'auth:api'], function(){

        Route::group(['middleware' => 'CheckDeleteUser'] , function(){

            Route::group([ 'middleware' => 'CheckUserBlock'] , function(){


                Route::get('logout', 'AuthenticationController@logout');
                Route::get('profile/{id?}', 'AuthenticationController@getProfile');
                Route::post('update-user', 'AuthenticationController@updateUser');
         
                Route::post('restaurant-list', 'RestaurantController@restaurantList');
                Route::get('restaurant-details/{id}','RestaurantController@restaurantDetails');
                Route::get('menu-listing/{restaurant_id}/{table_id}','RestaurantController@menuListing');
                Route::post('order-book','RestaurantController@orderBook');
                Route::post('server-waiter-order','RestaurantController@serverWaiterOrder');

                Route::match(['GET' , 'POST'] , 'add-cart' , 'RestaurantController@addCart');
                Route::match(['GET' , 'POST'] , 'cart-listing' , 'RestaurantController@cartListing');
                Route::match(['GET' , 'POST'] , 'restaurant-table-list' , 'RestaurantController@restaurantTableList');
                Route::match(['GET' , 'POST'] , 'menu-list-without-qr' , 'RestaurantController@menuListWithoutQr');
                Route::match(['GET' , 'POST'] , 'check-table-status' , 'RestaurantController@checkTableStatus');
                Route::match(['GET' , 'POST'] , 'request-waiter/{restaurant_id}/{table_id}' , 'RestaurantController@requestWaiter');

                Route::match(['GET' , 'POST'] , 'order-list' , 'RestaurantController@orderList');
                Route::match(['GET' , 'POST'] , 'order-list-details' , 'RestaurantController@orderListDetails');
            });

        });

    });

});
