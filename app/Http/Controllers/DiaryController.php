<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Diary;

class DiaryController extends Controller
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
        Diary::insert([
            'mybook_id' =>$request->mybook_id,
            'user_id' => request()->user()->id,
            'body' => $request->body,
            'created_at' => Carbon::now()
        ]);

        return back();
    }

    public function destroy($id)
    {
        $delete = Diary::find($id)->delete();
        return back()->with('success', 'Book Deleted!');
    }
}
