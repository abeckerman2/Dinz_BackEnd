<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);

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
