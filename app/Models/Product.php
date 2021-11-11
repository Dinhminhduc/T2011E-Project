<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

//    protected $fillable = [
//        'name',
//        'price',
//        'number',
//        'image',
//        'size',
//    ];


    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function orderDetails(){
        return $this->hasMany('App\Models\OrderDetail_Product','product_id','id');
    }


    public function orderProduct(){
        return $this->belongsToMany('App\Models\Order_Product','order_detail__products',
            'order_product_id','product_id');
    }
}
