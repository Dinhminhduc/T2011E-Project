<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('admin.brand.brand_view',compact('brands'));

    }
    public function BrandStore(Request $request){
            $validatedData = $request->validate([
                'name' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
                [
                    'name.required' => 'Please Input Product Name',
                    'image.mimes' => 'Image must be have jpg,jpeg,png'
                ]);

            $image = $request->file('image');

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);

            Brand::insert([
                'brand_name' => $request->name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

        $notification = array(
            'message' => 'Add Brand Successfully',
            'alert-type' => 'success'
        );

            return Redirect()->back()->with($notification);
    }
    public function BrandEdit($id){
        $brand = Brand::find($id);
        return view('admin.brand.brand_edit',compact('brand'));
    }

    public function BrandUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|min:4',
            'image' => 'mimes:jpg,jpeg,png',
        ],
            [
                'name.required' => 'Please Input Product Name',
                'image.mimes' => 'Image must be have jpg,jpeg,png'
            ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('image');

        if($brand_image){

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/product/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );

            return Redirect('brand/view')->with($notification);

        }else {
            Brand::find($id)->update([
                'brand_name' => $request->name,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );

            return Redirect('brand/view')->with($notification);
        }
    }
    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
//        Brand::find($id)->delete();
        $notification = array(
            'message' => 'Brand Delete Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
