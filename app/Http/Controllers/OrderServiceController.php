<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Staff;
use App\Models\Customer;
use App\Models\Order_service;
use App\Models\OrderDetail;




class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $order_service = Order_service::all();
        return view('order_service.index', compact('order_service'));
    }

    public function adoption(Request $request){
        $lsService = Service::orderBy('id','DESC')->get();
        $lsServiceType = ServiceType::orderBy('id','DESC')->get();

        return view('adoption', compact('lsService','lsServiceType'));
    }

    public function adoption_detail($id){

        $service = Service::find($id);
        $lsService = Service::orderBy('id','DESC')->get();
        $lsServiceType = ServiceType::orderBy('id','DESC')->get();
        $lsStaff = Staff::orderBy('id','DESC')->get();

        return view('adoption_detail', compact('service','lsServiceType','lsStaff','lsService'));
    }


    public function add_adoption(Request $request, $id){
    $service = Service::find($id);

    $cus = new Customer();
    $cus->first_name = $request->first_name;
    $cus->last_name = $request->last_name;
    $cus->address = $request->address;
    $cus->email = $request->phone;
    $cus->phone = $request->email;
    $cus->dichvu_id = $service->id;
    $cus->save();
    $cus_id = $cus->id;

    //save order
    $order = new Order_service();
    $order ->customer_id = $cus_id;

        $order->save();
         $dt = array(
            'name' => $request->first_name.' '.$request->last_name,
            'address' => $request->address,
            'dichvu' => $service->name_service,
        );
        $mail = new \App\Mail\OrderMail($dt);
        \Mail::to($request->email)->send($mail);
        \Cart::destroy();

        return view("/order_success");

    }
}
