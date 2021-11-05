<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    Public $timestamps = true;
    
    protected $fillable = [
        'comment', 'comment_name', 'comment_service_id'
    ];

    Protected $primaryKey = 'id';
    Protected $table = 'comments';

}
