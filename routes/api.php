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

$router->pattern('id', '[0-9]+');

Route::group(["namespace"=>"Api"], function (){

    Route::group(['namespace'=>'Auth'], function (){
        Route::post("register","AuthController@register");
        Route::post("login","AuthController@login")->name("login");
    });

    Route::group(["middleware"=>"auth:api"], function (){
		Route::get("users","UserController@all");
		Route::get("user","UserController@get");
        Route::post("deleteUser", "UserController@destroy");

		//Route::post('subscriptions/update', "SubscriptionsController@update");
		//Route::get('subscription', "SubscriptionsController@show");

    // articles
    Route::name('articles')->get('articles', 'ArticleController@index');
    Route::name('addArticle')->post('addArticle', 'ArticleController@store');
    Route::name('editArticle')->put('editArticle/{id}', 'ArticleController@update');
    Route::name('deleteArticle')->delete('deleteArticle/{id}', 'ArticleController@destroy');

    // exerciese
    Route::name('exerciese')->get('exerciese/{id}', 'ExerciseController@index');
    Route::name('addExerciese')->post('addExerciese', 'ExerciseController@store');
    Route::name('editExerciese')->put('editExerciese/{id}', 'ExerciseController@update');
    Route::name('deleteExerciese')->delete('deleteExerciese/{id}', 'ExerciseController@destroy');
	
    });
    
});
