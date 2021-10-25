<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal_detail extends Model
{
    use HasFactory;

    public function animal_type(){
        return $this->belongsTo('App\Models\Animal_type','animal_id','id');
    }
}
