<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    Public $timestamps = true;
    
    protected $fillable = [
        'comment_id', 'user_id', 'message'
    ];

    Protected $primaryKey = 'id';
    Protected $table = 'comment_replies';


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function comment(){
        return $this->belongsTo('App\Models\Comment');
    }
}
