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



Route::Group(['prefix' => '/v1'], function () {
    
    Route::get('/getBooks', 'Api\BookstoreApi@getBooks');
    Route::post('/createBook', 'Api\BookstoreApi@createBook');
    Route::post('/updateBook', 'Api\BookstoreApi@updateBook');
    Route::post('/deleteBook', 'Api\BookstoreApi@deleteBook');

    Route::post('/getBooksByAuthor', 'Api\BookstoreApi@getBooksByAuthor');
    Route::get('/authorMoreThan2Book', 'Api\BookstoreApi@authorMoreThan2Book');
    
});