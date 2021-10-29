<?php

namespace App\Http\Controllers;

use App\Models\Animal_detail;
use App\Models\Animal_type;
use Illuminate\Http\Request;

class Animal_DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsAniDetail = Animal_detail::all();
        return view('Animal_detail.index')->with([
            'lsAniDetail'=>$lsAniDetail
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsAni = Animal_type::all();
        return view('Animal_detail.add')->with(
            ["lsAni" => $lsAni]
        );
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
            'price' => 'required|numeric',
            'animal_type' => 'required'
        ]);
        $ani = new Animal_detail();
        $ani->name = $request->input('name');
//        $imgPath = "";
//        if ($request->hasFile("img")) {
//            $imgPath = $request->img->store('image');
//            $imgPath = 'image/'.$imgPath;
//        }
//        $ani->img = $imgPath;
        $image = $request->file('img');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/product/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);

        $ani->img = $last_img;
        $ani->desc = $request->input('desc');
        $ani->price = $request->input('price');
        $ani->dateOfBirth  =$request->input('dob');
        $ani->animal_id = $request->input('animal_type');
        $ani->save();

        $request->session()->flash("msg", "Insert pet successfully");
        return redirect(route("animal_detail.index"));
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
        $lsDetail = Animal_detail::find($id);
        $lsType = Animal_type::all();
        return view('Animal_detail.edit')->with([
            'lsType'=>$lsType,'lsDetail'=>$lsDetail
        ]);
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
            'price' => 'required|numeric',
            'animal_type' => 'required'
        ]);
        $ani = Animal_detail::find($id);
        $ani->name = $request->input('name');
        $imgPath = "";
        if ($request->hasFile("img")) {
            $imgPath = $request->img->store('img');
            $imgPath = 'img/'.$imgPath;
        }
        $ani->img = $imgPath;
        $ani->desc = $request->input('desc');
        $ani->price = $request->input('price');
        $ani->dateOfBirth  =$request->input('dob');
        $ani->animal_id = $request->input('animal_type');
        $ani->save();

        $request->session()->flash("msg", "Update pet successfully");
        return redirect(route("animal_detail.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $lsDetail = Animal_detail::find($id);
        $lsDetail->delete();
        $request->session()->flash('msg','Delete successfully');
        return redirect(route("animal_detail.index"));
    }
}
