<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Animal_detail;
use App\Models\Staff;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Blog;
use App\Models\testimonials;
use DB;


class IndexController extends Controller
{
    public function welcome(){
        $lsDetail = Animal_detail::orderBy('created_at','desc')->take(6)->get();
        $count = DB::table('customerss')->get()->count();
        $countService = DB::table('services')->get()->count();
        $countSuccessService = DB::table('customerss')->where('status', 2)->count();
        $count_Service = DB::table('customerss')->whereNotIn('status', [3])->count();
        $countNotService = DB::table('customerss')->where('status', 3)->count();
        $lsHot_deals = Product::where('hot_deals',1)->orderBy('id','DESC')->limit(5)->get();
        $lsSpecial_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(1)->get();
        $lsBrands = Brand::all();

        $lsStaff = Staff::orderBy('ten','asc')->take(3)->get();
        $lsTesti =  \App\Models\testimonials::all();
//        return view('user/index',compact('lsDetail','lsStaff','lsTesti',
//            'count','countService','countSuccessService','countNotService','count_Service'));
        return view('user/index')->with(['lsDetail' => $lsDetail,
            'lsStaff' => $lsStaff,
            'lsTesti' => $lsTesti,
            'count' => $count,
            'countService' => $countService,
            'countSuccessService' => $countSuccessService,
            'countNotService' => $countNotService,
            'count_Service'=> $count_Service,
            'lsHot_deals' => $lsHot_deals,
            'lsBrands' => $lsBrands,
            'lsSpecial_deals' => $lsSpecial_deals]);
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
    public function contact_service(Request $request){
        return view('contact_service');
    }



}
