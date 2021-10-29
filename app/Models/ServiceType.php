<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    Protected $primaryKey = 'id';
    Protected $table = 'service_types';

    protected $fillable = ['name'];

    public function service() {
        return $this->hasMany('App\Models\Service');
    }
}
