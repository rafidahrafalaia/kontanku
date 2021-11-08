<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::get('user', 'AuthController@getAuthUser');
Route::get('allUser/{id}', 'AuthController@getUser');

// Books
Route::apiResource('books', 'BookController');
Route::get('/books/{id}', function ($id) {
    return redirect('https://openlibrary.org/api/books?bibkeys=ISBN:'+$id+'&jscmd=data&format=jso');
});
Route::post('books/{book}', 'BookController@store');
Route::put('books/{book}', 'BookController@update');
Route::delete('books/{book}', 'BookController@delete');

// Borrow
Route::apiResource('borrows', 'BorrowController');
Route::post('borrows/{book}', 'BorrowController@store');
Route::delete('borrows/{book}', 'BorrowController@delete');