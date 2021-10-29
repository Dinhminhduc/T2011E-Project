<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Staff;
// use App\Models\StaffType;



class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request  $request)
    {
        $lsService = Service::orderBy('id','DESC')->get();
        // $lsStaffType = StaffType::orderBy('id','DESC')->get();
        // $lsCheckbox = Checkbox::orderBy('id','ASC')->get();
        $staffs = Staff::all();
        $search_name = $request->search_name;
        if(isset($search_name)){
            $staffs = Staff::where('ten','like','%'.$search_name.'%')->paginate(4);
        }else{
            $staffs = Staff::paginate(4);
        }
        return view('staff.index')->with(compact('staffs','lsService'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsService = Service::orderBy('id','DESC')->get();
        // $lsStaffType = StaffType::orderBy('id','DESC')->get();
        return view('staff.add')->with(compact('lsService'));
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
            'ten' => 'required|min:1|max:255',
            'chucvu' => 'required',
            'kichhoat' => 'required',
            'ngaysinh' => 'required|',
            'hinhanh' => 'required',
            // 'dichvu_id' => 'required',
            'diachi' => 'required',
            'sodienthoai' => 'required',
            
        ]);
        $staffs = new Staff();
        $staffs->ten = $request->input('ten');
        $staffs->chucvu = $request->input('chucvu');
        $staffs->ngaysinh = $request->input('ngaysinh');
        // $staffs->date_start = $request->input('date_start');
        // $staffs->date_end = $request->input('date_end');
        // $staffs->dichvu_id = $request->input('dichvu_id');
        // $staffs->category = $request->input('category');
        $staffs->kichhoat = $request->input('kichhoat');
        // $staffs->ngaylam_id = $request->input('ngaylam_id');
        $staffs->diachi = $request->input('diachi');
        $staffs->sodienthoai = $request->input('sodienthoai');
    
        //upload ảnh
        $image = $request->hinhanh;
        $path = public_path('img/staff-img/');
        $get_name_image = $image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
        $image->move($path, $new_image);
    
        $staffs->hinhanh = $new_image;
        //-----
       
        $staffs->save();

        $request->session()->flash("msg", "Insert staff successfully");
        return redirect(route("staff.index"));
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
        $lsService = Service::orderBy('id','DESC')->get();
        // $lsStaffType = StaffType::orderBy('id','DESC')->get();
        $staffs = Staff::find($id);
        return view('staff.edit', compact('staffs','lsService'));
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
            'ten' => 'required|min:1|max:255',
            'chucvu' => 'required',
            'ngaysinh' => 'required',
            // 'dichvu_id' => 'required',
            'kichhoat' => 'required',
            'diachi' => 'required',
            'sodienthoai' => 'required',
            
        ]);
        $staffs = Staff::find($id);
        $staffs->ten = $request->input('ten');
        $staffs->chucvu = $request->input('chucvu');
        $staffs->ngaysinh = $request->input('ngaysinh');
        // $staffs->date_start = $request->input('date_start');
        // $staffs->date_end = $request->input('date_end');
        // $staffs->dichvu_id = $request->input('dichvu_id');
        // $staffs->category = $request->input('category');
        // $staffs->ngaylam_id = $request->input('ngaylam_id');
        $staffs->kichhoat = $request->input('kichhoat');
        $staffs->diachi = $request->input('diachi');
        $staffs->sodienthoai = $request->input('sodienthoai');
    

        //upload ảnh
        $image = $request->hinhanh;
        if($image){
            $path1= 'img/staff-img/'.$staffs->hinhanh;
            if(file_exists($path1)){
                unlink($path1);
            }

        $path = public_path('img/staff-img/');
        $get_name_image = $image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
        $image->move($path, $new_image);
    
        $staffs->hinhanh = $new_image;
    }
        //-----
        $staffs->save();

        $request->session()->flash("msg", "Update staff successfully");
        return redirect(route("staff.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::find($id)->delete();
        return redirect()->back()->with('message', ' Delete Staff Successfully');
    }
}
