<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Order_service;
use App\Models\ServiceType;


class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $service_type = ServiceType::all();
        $search_name = $request->search_name;
        if(isset($search_name)){
            $service_type = ServiceType::where('name','like','%'.$search_name.'%')->paginate(4);
        }else{
            $service_type = ServiceType::paginate(4);
        }
        return view('service_type.index', compact('service_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service_type.create');
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
            'name' => 'required|min:1|max:255',
          
           
        ]
    );

    $data = $request->all();
    $service_type = new ServiceType($data);
    $service_type->name = $data['name'];
   
 
    $service_type->save();
    return redirect()->back()->with('message', ' Thêm dịch vụ thành công');
    return redirect(route("service_type.index"));
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
        
        $service_type = ServiceType::find($id);
        return view('service_type.edit', compact('service_type'));
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
            'name' => 'required|min:1|max:255',
         
        ]
    );

   
    $service_type = servicetype::find($id);
    $service_type->name = $request->input('name');
 
    $service_type->save();
    $request->session()->flash('msg', 'Update successfully');
    return redirect(route("service_type.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceType::find($id)->delete();
        return redirect()->back()->with('message', ' Delete Service Successfully');
    }
}
