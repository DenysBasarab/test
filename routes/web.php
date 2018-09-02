<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home/{id}', 'HomeController@show')->name('homeShow');

Route::get('/edit', 'HomeController@add');
Route::post('/edit', 'HomeController@store')->name('articleStore');

Route::delete('/delete/{article}', function($article) {
    $article_tmp = \App\Article::where('id', $article)->first();
    $article_tmp->delete();
    return redirect('/home');
})->name('articleDelete');

