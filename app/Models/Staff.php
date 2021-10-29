<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    Public $timestamps = true;
    
    protected $fillable = [
        'ten', 'chucvu', 'ngaysinh', 'diachi','hinhanh','sodienthoai','dichvu_id','kichhoat'
    ];
    
    Protected $primaryKey = 'id';
    Protected $table = 'staff';

    public function service() {
        return $this->hasMany('App\Models\Service');
    }

    // public function stafftype() {
    //     return $this->belongsTo('App\Models\StaffType','stafftype_id','id');
    // }

    // public function ngaylam() {
    //     return $this->belongsTo('App\Models\Checkbox','ngaylam_id','id');
    // }

    
}
