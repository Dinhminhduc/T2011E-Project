<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id','id');
    }

    public function orderDetails(){
        return $this->hasMany('App\Models\OrderDetail_Product','order_product_id','id');
    }

    public function products(){
        return $this->belongsToMany('App\Models\Product','order_detail__products',
            'product_id','order_product_id');
    }
}
