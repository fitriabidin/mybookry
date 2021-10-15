<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Comment;
class PostCommentController extends Controller
{
    //
    public function store(Request $request)
    {
        // validation
        request()->validate([
            'body' => 'required'
        ]);

        // add a comment to the given post
        // get current user id
        Comment::insert([
            'book_id' =>$request->book_id,
            'user_id' => request()->user()->id,
            'body' => $request->body,
            'created_at' => Carbon::now()
        ]);

        return back();
    }
}
