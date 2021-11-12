<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Staff;
use App\Models\Order_service;


class SeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lsServiceType = ServiceType::orderBy('id','DESC')->get();
        // $lsOrder = Order_service::orderBy('id','DESC')->get();
        $lsStaff = Staff::orderBy('id','DESC')->get();
        $services = Service::all();
        $search_name = $request->search_name;
        if(isset($search_name)){
            $services = Service::where('name_service','like','%'.$search_name.'%')->paginate(4);
        }else{
            $services = Service::paginate(4);
        }
        return view('service.index')->with(compact('services','lsServiceType','lsStaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsStaff = Staff::orderBy('id','DESC')->get();
        $lsServiceType = ServiceType::orderBy('id','DESC')->get();
        return view('service.add',compact('lsServiceType','lsStaff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'servicetype_id'=> 'required',
            'staff_id'=> 'required',
            'title'=> 'required',
            'hinhanh'=> 'required',
            'slug'=> 'required',

        ]
    );

    $data = $request->all();
    $service = new Service();
    $service->name_service = $data['name_service'];
    $service->slug = $data['slug'];
    $service->tukhoa = $data['tukhoa'];
    $service->price = $data['price'];
    $service->price_end = $data['price_end'];
    $service->title = $data['title'];
    $service->tomtat = $data['tomtat'];
    $service->servicetype_id = $data['servicetype_id'];
    $service->staff_id = $data['staff_id'];


    $image = $request->hinhanh;
        $path = public_path('img/service-img/');
        $get_name_image = $image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
        $image->move($path, $new_image);

        $service->hinhanh = $new_image;

    $service->save();
    return redirect()->back()->with('message', ' Thêm danh muc thành công');
    return redirect(route("service.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lsStaff = Staff::orderBy('id','DESC')->get();
        $lsServiceType = ServiceType::orderBy('id','DESC')->get();
        $service = Service::find($id);
        return view('service.edit', compact('service','lsServiceType','lsStaff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_service' => 'required|min:1|max:255',
            'price' => 'required',
            'slug' => 'required',
            'servicetype_id'=> 'required',
            'staff_id'=> 'required',

        ]
    );


    $service = service::find($id);
    $service->name_service = $request->input('name_service');
    $service->slug = $request->input('slug');
    $service->tukhoa = $request->input('tukhoa');
    $service->price = $request->input('price');
    $service->price_end = $request->input('price_end');
    $service->servicetype_id = $request->input('servicetype_id');
    $service->staff_id = $request->input('staff_id');
    $service->title = $request->input('title');
    $service->tomtat = $request->input('tomtat');

    $image = $request->hinhanh;
    if($image){
        $path= '/img/service-img/'.$service->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }

    $path = public_path('img/service-img/');
    $get_name_image = $image->getClientOriginalName();
    $name_image = current(explode('.',$get_name_image));
    $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
    $image->move($path, $new_image);

    $service->hinhanh = $new_image;
}
    //-----


    $service->update();
    $service->save();
    $request->session()->flash('msg', 'Update successfully');
    return redirect(route("service.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        return redirect()->back()->with('message', ' Delete Staff Successfully');
    }
}
