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
        $products = Product::paginate(5);
        return view('admin.product.product_view',compact('products'));
    }

    public function EditProduct($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        return view('admin.product.product_edit',compact('categories','brands','products','multiImgs'));

    }

    public function ProductDataUpdate(Request $request)
    {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
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
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.product')->with($notification);
    }

    /// Multiple Image Update
    public function MultiImageUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/product/';
            $last_img = $up_location.$img_name;
            $img->move($up_location,$img_name);

            MultiImg::where('id',$id)->update([
                'photo_name' => $last_img,
                'updated_at' => Carbon::now(),

            ]);

        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end mehtod

    /// Product Main Image Update ///
    public function MainImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('mainImage');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/product/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);

        Product::findOrFail($pro_id)->update([
            'image' => $last_img,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Main Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end method

    //// Multi Image Delete ////
    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// end method

}
