<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::all();
        $search_name = $request->search_name;
        if(isset($search_name)){
            $blogs = Blog::where('name','like','%'.$search_name.'%')->paginate(4);
        }else{
            $blogs = Blog::paginate(4);
        }
        return view('blog_animal.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog_animal.create');
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
            'name' => 'required',
            // 'tomtat' => 'required',
            'title'=> 'required',
            // 'img'=> 'required',
            // 'description'=> 'required',
            // 'animail_id'=> 'required',
        ]
    );

    $data = $request->all();
    $blogs = new Blog();
    $blogs->name = $data['name'];
    $blogs->tomtat = $data['tomtat'];
    $blogs->slug = $data['slug'];
    $blogs->tukhoa = $data['tukhoa'];
    $blogs->title = $data['title'];
    $blogs->description = $data['description'];
    // $blogs->tomtat = $data['tomtat'];
    // $blogs->animail_id = $data['animail_id'];
  

    $image = $request->hinhanh;
        $path = public_path('img/blog-img/');
        $get_name_image = $image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
        $image->move($path, $new_image);
    
        $blogs->hinhanh = $new_image;
 
    $blogs->save();
    return redirect()->back()->with('message', 'Add BLog Successfully');
    return redirect(route("blog_animal.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog_animal.edit', compact('blog'));
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
    //     $request->validate([
    //         'name_service' => 'required|min:1|max:255',
    //         'price' => 'required',
    //         'slug' => 'required',
    //         'servicetype_id'=> 'required',
    //         'staff_id'=> 'required',
           
    //     ]
    // );

    $blog = Blog::find($id);
    $blog->name = $request->input('name');
    $blog->title = $request->input('title');
    $blog->slug = $request->input('slug');
    $blog->tukhoa = $request->input('tukhoa');
    $blog->tomtat = $request->input('tomtat');
    $blog->description = $request->input('description');

    $image = $request->hinhanh;
    if($image){
        $path= '/img/blog-img/'.$blog->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }

    $path = public_path('img/blog-img/');
    $get_name_image = $image->getClientOriginalName();
    $name_image = current(explode('.',$get_name_image));
    $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
    $image->move($path, $new_image);

    $blog->hinhanh = $new_image;
    }
    $blog->update();
    $blog->save();
    $request->session()->flash('msg', 'Update Blog successfully');
    return redirect(route("blog_animal.index"));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
