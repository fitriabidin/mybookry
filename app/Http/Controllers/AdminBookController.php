<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Services\BookApiService;
use App\Services\SetBookService;

class AdminBookController extends Controller
{
    //
    public function index()
    {
        $currentPage = request()->get('page',1);
        $books = Cache::rememberForever('adminbook-' .$currentPage, function(){
            return Book::select(['id','isbn','title','price','is_popular'])->simplePaginate(10);
        });

        return view('admin.index', [
            'books' => $books,
        ]);
    }



    public function search(Request $request, BookApiService $bookApiService)
    {

        $bookApi = $bookApiService->openBookLibrary($request);

        if(array_key_exists('ISBN:'.$bookApi[1],$bookApi[0]) == true){
        return view('admin.autofill', [
        'books' => $bookApi[0],
        'isbn' => $bookApi[1]
        ]);
        }
        else {
             return redirect('/admin/books/create')->with('success','No Book Api Found');;
        }

    }

    public function show()
    {

        return view('admin.show', [
            'books' => Book::select(['id','isbn','title','price','is_popular'])->where('is_popular', true)->simplePaginate(10),
        ]);
    }


    public function create ()
    {
     return view('admin.create');
    }


    public function edit($id)
    {
        $books = Book::find($id);
        return view('admin.edit', [
            'books' => $books
        ]);
    }

    public function store (Request $request)
    {
        // testing for accepting request
        // ddd(request()->file('image'));
        // validate
        Cache::flush();
        $attributes = $request-> validate([
            'title' => 'required',
            'slug' => 'required|unique:books,slug',
            'author' => 'required',
            'isbn' => 'required',
            'image' => 'required|image',
            'excerpt' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $attributes['image'] = request()->file('image')->store('image');
        Book::create($attributes);
        return redirect('/admin/books');
    }


    public function update(Request $request , $id)
    {
         // validation of form input
         Cache::flush();
         $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:books,slug,' . $id,
            'author' => 'required',
            'isbn' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        // get old image data
        $old_image = $request->old_image;
        // Get new Image data and set to path
        $book_image = $request->file('image');

        // if new image exist, update it and remove previous image, else, dont update it
        if($book_image){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($book_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        // Move file to path location
        $book_image->move($up_location,$img_name);

        // remove old image
        unlink($old_image);
        // update data to model Eloquen ORM
        Book::find($id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'image' => $last_img,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        // After insert back to previous page with success message
        return Redirect()->back()->with('success','Book Updated Succesfully');

        }else {
            Book::find($id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            ]);

            // After insert back to previous page with success message
            return Redirect()->back()->with('success','Book Updated Succesfully');
        }
    }


    public function popular(Request $request , $id, SetBookService $setBookService )
    {

        $setBookService->setPopular($request,$id);
       return back()->with('success', 'Status Updated!');
    }




    public function destroy(Book $book)
    {
        Cache::flush();
        $book->delete();
        return back()->with('success', 'Book Deleted!');
    }
}
