<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\MultiImg;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\Models\Order_Product;
use App\Models\OrderDetail_Product;

class ShopController extends Controller
{
    public function allShop(){
        $lsProduct = Product::latest()->take(9)->get();
        $lsCate = Category::all();
        $hot_deals = Product::where('hot_deals',1)->orderBy('id','DESC')->limit(3)->get();
        return view("user.shop.shop")->with(['lsProduct' => $lsProduct,
            'lsCate' => $lsCate,
            'hot_deals' => $hot_deals]);
    }

    public function detailShop(Request $request, $id){
        $products = Product::find($id);
        $multiImg = MultiImg::where('product_id',$id)->get();
        return view('user.shop.shop-detail')->with(['products' => $products,
            'multiImg' => $multiImg]);;
    }

    public function detailProduct(Request $request, $pid){
        $product = Product::find($pid);
        \Cart::add([['id' => $pid,
            'name' => $product->name,
            'qty' => $request->input('quantity'),
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => $product->image]]
        ]);

        return redirect()->route('detail.shop', $pid);
    }

    public function cart(Request $request){
        return view('user.cart.cart');
    }

    public function clear(){
        \Cart::destroy();
        return redirect()->back();
    }

    public function update(Request $request){
        $qty = $request->quantity;
        $rowid = $request->rowid;
        foreach ($rowid as $key => $rid){
            \Cart::update($rid, $qty[$key]);
        }
        return redirect()->back();
    }

    public function place_order_product(Request $request){

        //Save Customer
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        $cus_id = $customer->id;

        //Save Order
        $order = new Order_Product();
        $order->customer_id = $cus_id;
        $order->status = 0;
        $order->total = \Cart::total();
        $order->save();

        //Save Order Detail
        foreach (\Cart::content() as $row){
            $orderDetail = new OrderDetail_Product();
            $orderDetail->order_product_id = $order->id;
            $orderDetail->product_id = $row->id;
            $orderDetail->quantity = $row->qty;
            $orderDetail->price = $row->price;
            $orderDetail->save();

            //Update product
            $product = Product::find($row->id);
            $product->number = $product->number - $row->qty;
            $product->save();
        }
        \Cart::destroy();
        //Success
        return redirect()->back();
    }


}
