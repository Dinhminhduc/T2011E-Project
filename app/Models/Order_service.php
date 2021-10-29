<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_service extends Model
{
    use HasFactory;
    Public $timestamps = false;

    // 1 order co nhieu sp
    public function orderdetai(){
        return $this->hasMany('App\Models\OrderDetail','order_id','id');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service',
            'order_details','order_id','dichvu_id');
    }
}
