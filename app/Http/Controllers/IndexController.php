<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal_detail;
use App\Models\testimonials;
use DB;

class IndexController extends Controller
{
    public function welcome(){
        $lsDetail = Animal_detail::orderBy('created_at','desc')->take(6)->get();
        $lsTesti =  \App\Models\testimonials::all();
        return view('user/index')->with(['lsDetail'=>$lsDetail,'lsTesti'=>$lsTesti]);
    }
    public function doglist(){
        $lsDetail = Animal_detail::orderBy('created_at','desc')->take(6)->get();
        return view('user/dog-list')->with(['lsDetail'=>$lsDetail]);
}

    // public function index(){

    //     return view('admin/show', compact('count'));
    // }

}
