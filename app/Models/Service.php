<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Service extends Model
{
    use HasFactory;

    Public $timestamps = true;
    
    protected $fillable = [
        'staff_id', 'servicetype_id', 'name_service', 'price','hinhanh','title','date_start','date_end','slug'
    ];

    Protected $primaryKey = 'id';
    Protected $table = 'services';

    Public function staff(){
        return $this->belongsTo('App\Models\Staff','staff_id','id');
    }

    public function servicetype() {
        return $this->belongsTo('App\Models\ServiceType','servicetype_id','id');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer');
    }


    // public function orderdetai(){
    //     return $this->hasMany('App\Models\OrderDetail','dichvu_id','id');
    // }

    // public function order(){
    //     return $this->belongsToMany('App\Models\Service',
    //         'order_details','order_id','dichvu_id');
    // }

    // public function stafftype(){
    //     return $this->belongsTo('App\Models\StaffType');
    // }
}
