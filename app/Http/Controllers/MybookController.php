<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Mybook;
use App\Models\Diary;
use Illuminate\Support\Carbon;
use App\Services\SetBookService;

class MybookController extends Controller
{
    //
    public function index(Request $request, $id)
    {
    return view('mybooks.index', [

        'mybooks' => Mybook::with(['book'])->where('user_id', $id)->paginate(4),
        'curbooks' => Mybook::where('user_id', $id)->where('is_reading', true)->take(1)->get(),
        'favbooks' => Mybook::where('user_id', $id)->where('is_favorite', true)->take(4)->get()
    ]);
    }

    public function show(Request $request, $id)
    {
    return view('mybooks.show', [
        'mybooks'=> Mybook::where('user_id', auth()->id())->firstWhere('book_id', $id),
    ]);
    }

    public function mybook(Request $request , $id,SetBookService $setBookService)
    {
        $setBookService->setMybook($request,$id);

       return back()->with('success', 'Status Updated!');
    }

    public function favorite(Request $request , $id,SetBookService $setBookService)
    {
        $setBookService->setFavorite($request,$id);


       return back()->with('success', 'Status Updated!');
    }

    public function current(Request $request , $id,SetBookService $setBookService)
    {
        $setBookService->setCurrent($request,$id);

       return back()->with('success', 'Status Updated!');
    }
}




