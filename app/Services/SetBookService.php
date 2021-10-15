<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Mybook;
use Illuminate\Support\Facades\Cache;

class SetBookService {

    public function setPopular(Request $request,$id) {
        Cache::flush();
        $attributes = $request-> validate([
            'is_popular' => 'required',
        ]);

        if($request->is_popular == false){
        Book::find($id)->update(['is_popular' => true,]);
        } else {
            Book::find($id)->update(['is_popular' => false,]);
        }
    }

    public function setMybook(Request $request,$id) {

        $mybook = Mybook::where('user_id', auth()->id())->firstWhere('book_id', $id);

        // if no book exist add to book list, else. delete it
        if($mybook  == null){
            Mybook::insert([
                'book_id' => $id,
                'user_id' => auth()->id(),
                'created_at' => Carbon::now()
            ]);
        } else {
            Mybook::where('user_id', auth()->id())->firstWhere('book_id', $id)->delete();
        }
    }

    public function setFavorite(Request $request,$id) {

        $mybook = Mybook::where('user_id', auth()->id())->firstWhere('book_id', $id);

        $attributes = $request-> validate([
            'is_favorite' => 'required',
        ]);

        // if no book exist add to book list, else. delete it
        if($request->is_favorite == false){
            $mybook->update(['is_favorite' => true,]);
            } else {
                $mybook->update(['is_favorite' => false,]);
            }

    }

    public function setCurrent(Request $request,$id) {

        $mybook = Mybook::where('user_id', auth()->id())->firstWhere('book_id', $id);

        $attributes = $request-> validate([
            'is_reading' => 'required',
        ]);

        // if no book exist add to book list, else. delete it
        if($request->is_reading == false){
            $mybook->update(['is_reading' => true,]);
            } else {
                $mybook->update(['is_reading' => false,]);
            }
    }




}





?>
