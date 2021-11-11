<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal_detail;
use App\Models\Staff;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Blog;
use App\Models\testimonials;


class IndexController extends Controller
{
    public function welcome(){
        $lsDetail = Animal_detail::orderBy('created_at','desc')->take(6)->get();
        $lsStaff = Staff::orderBy('ten','asc')->take(3)->get();
        $lsTesti =  \App\Models\testimonials::all();
        return view('user/index',compact('lsDetail','lsStaff','lsTesti'));
    }
    public function doglist(){
        $lsDetail = Animal_detail::orderBy('created_at','desc')->take(6)->get();
        return view('user/dog-list')->with(['lsDetail'=>$lsDetail]);
}
    public function blog(Request $request){
        $blogs = Blog::orderBy('id','DESC')->take(3)->get();
        return view('user/blog', compact('blogs'));
    }

    public function blog_detail($slug){
        $blog = Blog::where('slug',$slug)->first();
        $blogs = Blog::orderBy('created_at', 'desc')->take(2)->get();

        $next_blog = Blog::where('slug','>',$blog->slug)->min('slug');

        $max_id=Blog::orderBy('id','desc')->first();
        $min_id=Blog::orderBy('id','asc')->first();

        $prev_blog = Blog::where('slug','<',$blog->slug)->max('slug');

        return view('user/blog-detail',
         compact('blog','blogs','next_blog','prev_blog','max_id','min_id'));
    }

    public function tag(Request $request, $tag){
        $blog = Blog::orderBy('id','DESC')->take(3)->get();
        $blogs = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $lsDetail = Animal_detail::orderBy('created_at','desc')->take(6)->get();
        $lsStaff = Staff::orderBy('ten','asc')->take(3)->get();
        $lsTesti =  \App\Models\testimonials::all();
        $blog_tag = Blog::where('title', 'LIKE', '%'.$tag.'%')
        ->orWhere('description', 'LIKE', '%'.$tag.'%')
        ->orWhere('slug', 'LIKE', '%'.$tag.'%')
        ->get();


        return view('user/tag', compact('blog','blogs','lsTesti','lsDetail','lsStaff','tag'))
        ->with('tag',$tag)->with('blog_tag',$blog_tag);
    }

    public function tag_service(Request $request, $tag){
        $service = Service::orderBy('id','DESC')->get();
       
        $service_tag = Service::where('title', 'LIKE', '%'.$tag.'%')
        ->orWhere('tomtat', 'LIKE', '%'.$tag.'%')
        ->orWhere('slug', 'LIKE', '%'.$tag.'%')
        ->get();

        return view('user/tag_service', compact('service','service_tag'))
        ->with('tag',$tag)->with('service_tag',$service_tag);
    }



}
