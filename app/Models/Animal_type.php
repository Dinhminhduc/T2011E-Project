<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal_type extends Model
{
    use HasFactory;

    public function animal_detail(){
        return $this->hasMany('App\Models\Animal_detail');
    }
}
