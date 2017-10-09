<?php

use Illuminate\Http\Request;
use App\Models\Book;

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

Route::group(['middleware' => 'api'], function() {
    Route::get('books',  function() {
        $obj = new Book();
        $result = $obj->all();
        return json_encode($result);
    });

    Route::get('authores',  function() {
        $obj = new Book();
        $result = $obj->select('author')->groupBy('author')->get();
        Log::info(\DB::getQueryLog());
        return json_encode($result);
    });
});
