<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class ProductController extends Controller
{

    public function AddProduct(Request $request){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.product_add',compact('categories','brands'));
    }

    public function StoreProduct(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/product/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'number' => $request->number,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'image' => $last_img,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        //Multi Image Upload Start
        $images = $request->file('multi_img');
        foreach ($images as $img){
            $name_gen_mul = hexdec(uniqid());
            $img_ext_mul = strtolower($img->getClientOriginalExtension());
            $img_name_mul = $name_gen_mul.'.'.$img_ext_mul;
            $up_location_mul = 'image/multi_img/';
            $last_img_mul = $up_location_mul.$img_name_mul;
            $img->move($up_location_mul,$img_name_mul);
//            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
//            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
//            $uploadPath = 'upload/products/multi-image/' . $make_name;
         MultiImg::insert([
             'product_id' => $product_id,
             'photo_name' => $last_img_mul,
             'created_at' => Carbon::now(),
         ]);

        }
        // End Multi Image Upload
        $notification = array(
            'message' => 'Product Insert Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }

    public function ManageProduct(){

        $products = Product::latest()->get();
        return view('admin.product.product_view',compact('products'));
    }

    public function EditProduct($id){

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        return view('admin.product.product_edit',compact('categories','brands','products'));

    }

//    public function Update(Request $request, $id){
//        $validatedData = $request->validate([
//            'name' => 'required|min:4',
//            'price' => '',
//            'number' => '',
//            'image' => 'mimes:jpg,jpeg,png',
//            'size' => ''
//        ],
//            [
//                'name.required' => 'Please Input Product Name',
//                'name.min' => 'Product Longer Than 4 Character',
//                'image.mimes' => 'Image must be have jpg,jpeg,png'
//            ]);
//
//        $old_image = $request->old_image;
//        $product_image = $request->file('image');
//
//        if($product_image){
//
//            $name_gen = hexdec(uniqid());
//            $img_ext = strtolower($product_image->getClientOriginalExtension());
//            $img_name = $name_gen.'.'.$img_ext;
//            $up_location = 'image/product/';
//            $last_img = $up_location.$img_name;
//            $product_image->move($up_location,$img_name);
//
//            unlink($old_image);
//            Product::find($id)->update([
//                'name' => $request->name,
//                'price' => $request->price,
//                'number' => $request->number,
//                'image' => $last_img,
//                'size' => $request->size,
//                'created_at' => Carbon::now()
//            ]);
//
//            return Redirect('admin/product/all')->with('success','Product Update Successfully');
//
//        }else {
//            Product::find($id)->update([
//                'name' => $request->name,
//                'price' => $request->price,
//                'number' => $request->number,
//                'size' => $request->size,
//                'created_at' => Carbon::now()
//            ]);
//
//            return Redirect('admin/product/all')->with('success','Product Update Successfully');
//        }
//    }


}
