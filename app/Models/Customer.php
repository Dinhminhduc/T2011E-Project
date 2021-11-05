<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function orders(){
        return $this->hasMany('App\Models\Order_service');
    }

    public function service(){
        return $this->hasOne('App\Models\Service','dichvu_id','id');
    }

    public function ordersProduct(){
        return $this->hasMany('App\Models\Order_Product');
    }
}
