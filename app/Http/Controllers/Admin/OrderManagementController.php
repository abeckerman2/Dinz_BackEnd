<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderManagementController extends Controller
{
    public function orderManagement(){
        return view('admin.order-management');
    }

    public function orderDetails(){
        return view('admin.order-details');
    }

    public function editOrder(){
        return view('admin.edit-order');
    }
}
