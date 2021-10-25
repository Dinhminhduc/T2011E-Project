<?php

namespace App\Http\Controllers;

use App\Models\Animal_type;
use Illuminate\Http\Request;

class Animal_TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsAni = Animal_type::all();
        return view('Animal_type.index')->with(
            ["lsAni" => $lsAni]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Animal_type.add');
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
            'name' => 'required|min:3|max:255'
        ]);
        $type = new Animal_type();
        $type->name = $request->input('name');
        $type->save();
        $request->session()->flash("msg", "Insert type of animal successfully");
        return redirect(route("animal_type.index"));
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
        $ani = Animal_type::find($id);
        return view ('Animal_type.edit')->with([
            "ani"=>$ani
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
            'name' => 'required|min:3|max:255'
        ]);
        $ani = Animal_type::find($id);
        $ani->name = $request->input('name');
        $ani->save();
        $request->session()->flash('msg', 'Update successfully');
        return redirect(route("animal_type.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ani = Animal_type::find($id);
        $ani->delete();
        $request->session()->flash('msg', 'Delete successfully');
        return redirect(route("animal_type.index"));
    }
}
