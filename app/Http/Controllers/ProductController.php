<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class ProductController extends Controller
{
    public function AllProduct(){
        $products = Product::latest()->paginate(5);
        $trashProduct = Product::onlyTrashed()->latest()->paginate(3);
        return view('admin.product.product-index',compact('products','trashProduct'));
    }

    public function AddProduct(Request $request){
            $validatedData = $request->validate([
                'name' => 'required|min:4',
                'price' => 'required',
                'number' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
                'size' => 'required'
            ],
                [
                    'name.required' => 'Please Input Product Name',
                    'name.min' => 'Product Longer Than 4 Character',
                    'image.mimes' => 'Image must be have jpg,jpeg,png'
                ]);

            $image = $request->file('image');

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/product/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);

            Product::insert([
                'name' => $request->name,
                'price' => $request->price,
                'number' => $request->number,
                'image' => $last_img,
                'size' => $request->size,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back();
        }

    public function Edit($id){
        $products = Product::find($id);
        return view('admin.product.edit',compact('products'));
    }

    public function Update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|min:4',
            'price' => '',
            'number' => '',
            'image' => 'mimes:jpg,jpeg,png',
            'size' => ''
        ],
            [
                'name.required' => 'Please Input Product Name',
                'name.min' => 'Product Longer Than 4 Character',
                'image.mimes' => 'Image must be have jpg,jpeg,png'
            ]);

        $old_image = $request->old_image;
        $product_image = $request->file('image');

        if($product_image){

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($product_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/product/';
            $last_img = $up_location.$img_name;
            $product_image->move($up_location,$img_name);

            unlink($old_image);
            Product::find($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'number' => $request->number,
                'image' => $last_img,
                'size' => $request->size,
                'created_at' => Carbon::now()
            ]);

            return Redirect('admin/product/all')->with('success','Product Update Successfully');

        }else {
            Product::find($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'number' => $request->number,
                'size' => $request->size,
                'created_at' => Carbon::now()
            ]);

            return Redirect('admin/product/all')->with('success','Product Update Successfully');
        }
    }

    public function Delete($id){
//        $image = Product::find($id);
//        $old_image = $image->image;
//        unlink($old_image);

        Product::find($id)->delete();
        return Redirect('admin/product/all')->with('success','Product Delete Successfully');
    }

    public function Restore($id){
        $delete = Product::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Product Restore Successfully');
    }

    public function PDelete($id){
        $delete = Product::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Product Delete Forever');
    }

}
