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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('dash', function () {
//     return view('dash');
// });


Route::group(["middleware"=>"auth"], function (){
	// articles
	Route::name('articles')->get('articles', 'ArticleController@index');
	Route::name('addArticle')->post('addArticle', 'ArticleController@store');
	Route::name('editArticle')->put('editArticle/{id}', 'ArticleController@update');
	Route::name('deleteArticle')->delete('deleteArticle/{id}', 'ArticleController@destroy');

	// exerciese
	Route::name('exercieses')->get('exerciese/{id}', ' ExerciseController@index');
	Route::name('addExerciese')->post('addExerciese', ' ExerciseController@store');
	Route::name('editExerciese')->put('editExerciese/{id}', 'ExerciseController@update');
	Route::name('deleteExerciese')->delete('deleteExerciese/{id}', 'ExerciseController@destroy');

 });