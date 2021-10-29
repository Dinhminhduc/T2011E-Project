<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function allShop(){
        $lsProduct = Product::latest()->take(9)->get();
        return view("user.shop.shop")->with(['lsProduct' => $lsProduct]);
    }

    public function detailShop(Request $request, $id){
        $products = Product::find($id);
        return view('user.shop.shop-detail',compact('products'));
    }

    public function detailProduct(Request $request, $pid){
        $product = Product::find($pid);
        \Cart::add(['id' => $pid,
            'name' => $product->name,
            'image' => $product->image,
            'qty' => $request->input('quantity'),
            'price' => $product->price,
            'weight' =>'0',
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

}
