<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
 use Kamaln7\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    public function store(Request $request, $service){
        $this->validate($request, ['comment'=>'required|max:1000']);
        $comment = new Comment();
        $comment->service_id = $service;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        //Success message
        \Toastr::success('success','The comment created successfully');
        return redirect()->back();
    }
}
