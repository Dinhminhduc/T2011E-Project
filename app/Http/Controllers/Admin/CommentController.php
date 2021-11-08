<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->save();

         //Success message
         \Toastr::success('success','The comment created successfully');
         return redirect()->back();
    }
}
