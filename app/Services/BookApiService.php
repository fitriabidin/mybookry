<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookApiService {

    public function openBookLibrary(Request $request) {

        $isbn = $request->search;
        $response = Http::get("https://openlibrary.org/api/books?bibkeys=ISBN:{$isbn}&jscmd=data&format=json");
        $bookApi = $response->json();
        return [$bookApi,$isbn];
    }


    // public function newYorkTimesApi(Request $request) {

    //     //NewYorkTimesApi Services Here
    // }

     // public function bookReads(Request $request) {

    //     //bookReadsApi Services Here
    // }



}

?>
