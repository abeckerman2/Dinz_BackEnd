<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(Request $request){

        $total_users = DB::table('users')->whereDeletedAt(null)->count();
        $total_restaurants = DB::table('restaurants')->whereDeletedAt(null)->count();
        return view('admin.dashboard',compact('total_users','total_restaurants'));
     }
}
