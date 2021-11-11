<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;


    Public $timestamps = true;

//a
    public function ordersProduct(){
        return $this->hasMany('App\Models\Order_Product');
    }

}
