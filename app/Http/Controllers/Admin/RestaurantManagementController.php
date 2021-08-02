<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantManagementController extends Controller
{
    public function restaurantManagement(){
        return view('admin.restaurant-management');
    }


    public function restaurantDetails(){
        return view('admin.restaurant-details');
    }


    public function approvedRestaurant(){
        return view('admin.restaurant-approved');
    }

    public function editRestaurant(){
        return view('admin.edit-restaurant');
    }

    
    public function rejectedRestaurant(){
        return view('admin.restaurant-rejected');
    }

    public function rejectedRestaurantDetails(){
        return view('admin.restaurant-rejected-details');
    }
}
