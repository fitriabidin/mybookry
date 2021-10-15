<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\MybookController;
use App\Http\Controllers\DiaryController;
use App\Models\Book;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// testing routes
// Route::get('test', function () {


// });




// Book Page Route
Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('books/{id}', [BookController::class, 'show']);
Route::get('all', [BookController::class, 'allBook']);

// Registration Route
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Login Route
Route::get('login', [LoginController::class, 'create'])->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');

// review route
Route::post('books/{id}/comments',[PostCommentController::class, 'store'])->middleware('auth');

// Notes/Diaries route
Route::post('mybook/{id}/diaries',[DiaryController::class, 'store'])->middleware('auth');
Route::delete('mybook/diaries/{id}', [DiaryController::class, 'destroy']);

// Mybook route
Route::get('mybooks/{id}', [MybookController::class, 'index'])->middleware('auth');
Route::get('mybook/{id}', [MybookController::class, 'show'])->middleware('auth');
Route::post('mybooks/{id}', [MybookController::class, 'mybook'])->middleware('auth');
Route::post('mybook/favorite/{id}', [MybookController::class, 'favorite'])->middleware('auth');
Route::post('mybook/current/{id}', [MybookController::class, 'current'])->middleware('auth');


// admin route
route::middleware('admin')->group(function(){

Route::get('admin/books', [AdminBookController::class, 'index']);
Route::get('admin/books/search', [AdminBookController::class, 'search']);
Route::get('admin/books/create', [AdminBookController::class, 'create']);
Route::get('admin/books/popular', [AdminBookController::class, 'show']);
Route::post('admin/books', [AdminBookController::class, 'store']);
Route::get('admin/books/{id}',[AdminBookController::class, 'edit']);
Route::post('admin/books/update/{id}',[AdminBookController::class, 'update']);
Route::post('admin/books/popular/{id}', [AdminBookController::class, 'popular']);
Route::delete('admin/books/{book}', [AdminBookController::class, 'destroy']);

});

// logout route
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
