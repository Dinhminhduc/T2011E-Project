<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Staff;
// use App\Models\Comment;
use App\Models\CustomerS;
use App\Models\Order_service;
use App\Models\OrderDetail;
use Carbon\Carbon;



class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    //  public function load_comment(Request $request) {
    //     $service_id = $request->service_id;
    //     $comment = Comment::where('comment_service_id', $service_id)->get();
    //     $output='';
    //     foreach ($comment as $key => $comm) {
    //         $output.= '
    //         <div class="review p-5" style="margin-top:-30px">

    //             <div class="row d-flex">
    //                 <div class="d-flex flex-column pl-3">
    //                     <h4>'.$comm->comment_name.'</h4>
    //                     <p class="grey-text">30 min ago</p>
    //                 </div>
    //             </div>
    //             <div class="row pb-3">
    //                 <p>'.$comm->comment.'</p>
    //             </div>

    //         </div>';
    //     }
    //     echo $output;
    //  }
    public function index(Request $request)
    {

        $lsCustomer = CustomerS::all();
        $search_name = $request->search_name;
        $status = $request->status;
        $date = Carbon::now();
        // dd($date);
        $from = $request->from;
        $to = $request->to;
        $phone = $request->phone;

        if( isset($phone) ){
            $lsCustomer = CustomerS::orderBy('date_time','desc')
            ->where('phone','like','%'.$phone.'%')
            ->paginate(4);
        }elseif(isset($search_name) ){
            $lsCustomer = CustomerS::orderBy('date_time','desc')
            ->orWhere('first_name','like','%'.$search_name.'%')
            ->orWhere('last_name','like','%'.$search_name.'%')
            ->paginate(4);
        }elseif(isset($from) || isset($to)) {
            // $lsCustomer = \DB::select("SELECT *FROM customers WHERE created_at BETWEEN '$from' AND '$to' ") ->paginate(8);
            $lsCustomer = CustomerS::orderBy('date_time','desc')
            ->where('date_time', '>=', $from)
            ->where('date_time', '<=', $to)
            ->paginate(4);
        //    dd($from, $to);
        }elseif(isset($date)){
            // $lsCustomer = Customer::all()->where('date_time', '>=', $date)->update(['status'=>'3']);
            // return view('order.sortdelete',compact('lsCustomer'));
        }
        else{
            $lsCustomer = CustomerS::paginate(2);
        }

        return view('order.index', compact('lsCustomer'));
    }


    public function show($id)
    {
        $cus = CustomerS::find($id);
        return view('order.show', compact('cus'));
    }

    public function adoption(Request $request){
        $lsService = Service::orderBy('id','DESC')->get();
        $lsServiceType = ServiceType::orderBy('id','DESC')->get();

        return view('adoption', compact('lsService','lsServiceType'));
    }

    public function adoption_detail($slug){

        $service = Service::where('slug',$slug)->first();
        $lsService = Service::orderBy('id','DESC')->get();
        $lsServiceType = ServiceType::orderBy('id','DESC')->get();
        $lsStaff = Staff::orderBy('id','DESC')->get();

        return view('adoption_detail', compact('service','lsServiceType','lsStaff','lsService'));
    }


    public function add_adoption(Request $request, $id){
    $service = Service::find($id);

    $cus = new CustomerS();
    $cus->first_name = $request->first_name;
    $cus->last_name = $request->last_name;
    $cus->address = $request->address;
    $cus->email = $request->email;
    $cus->phone = $request->phone;
    $cus->date_time = $request->date_time;
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
        // \Cart::destroy();

        return view("/order_success");

    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function changeSTT($status,$id){
        $cus = CustomerS::find($id);
        $cus->status = $status;
        $cus->save();
        return redirect()->route('order.show',$id);
    }

    public function changeStatusJson(Request $request){
        $id = $request->id;
        $status = $request->status;
        $cus = CustomerS::find($id);
           $cus->status = $status;
           $cus->save();
           return response()->json([
              'status' =>'OK',
               'desc'=>'Change status success',
           ]);
    }
}
