<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Staff;
use App\Models\Customer;
use App\Models\Order_service;
use App\Models\OrderDetail;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $count = DB::table('customers')->get()->count();
        $countService = DB::table('services')->get()->count();
        $countSuccessService = DB::table('customers')->where('status', 3)->count();

        // dd();
        // dd($count);
        return view('admin.index', compact('count','countService','countSuccessService'));
    }

   
}
