<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerS extends Model
{
    use HasFactory;

    
    Public $timestamps = true;
    
    protected $fillable = [
        'dichvu_id', 'first_name', 'last_name', 'email','phone','address','date_time','status'
    ];

    Protected $primaryKey = 'id';
    Protected $table = 'customerss';

    // public function orders(){
    //     return $this->hasMany('App\Models\Order_service');
    // }

    public function service() {
        return $this->belongsTo('App\Models\Service','dichvu_id','id');
    }
}
