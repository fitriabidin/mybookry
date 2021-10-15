<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Mybook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
class BookController extends Controller
{

    public function index()
    {
        return view('books.index', [
        'popbooks'=>  Book::latest()->with(['category'])->popular()->take(12)->get()
    ]);
    }

    public function show($id)
    {
        $books = Book::find($id);
        if(Auth::check()){
        $mybooks = Mybook::where('user_id', auth()->user()->id)->firstWhere('book_id', $id);

        return view('books.show', [
        'books'=> $books,
        'mybooks'=> $mybooks,
    ]);
    }

    else{
        return view('books.show', [
            'books'=> $books,
        ]);
    }
    }

    public function allBook()
    {
        return view('books.all', [
        'books'=> Book::with(['category'])->latest()->filter(request(['search', 'category']))->simplePaginate(8),

    ]);
    }


}


