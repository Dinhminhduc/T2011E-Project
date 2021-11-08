<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    Public $timestamps = true;
    
    protected $fillable = [
        'comment', 'user_id', 'service_id'
    ];

    Protected $primaryKey = 'id';
    Protected $table = 'comments';

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function replies(){
        return $this->hasMany('App\Models\CommentReply');
    }


}
