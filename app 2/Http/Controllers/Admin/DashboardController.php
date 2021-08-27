<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use DB;
use App\Http\Controllers\Controller;
header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);

class DashboardController extends Controller
{
    public function dashboard(Request $request){

        $total_users = DB::table('users')->whereDeletedAt(null)->count();
        $total_restaurants = DB::table('restaurants')->whereDeletedAt(null)->count();
        return view('admin.dashboard',compact('total_users','total_restaurants'));
     }
}
