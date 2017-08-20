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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['prefix'=>'v1','namespace'=>'\Api\V1'],function () {

    Route::group(['middleware'=>'auth.user'],function(){
        Route::get('item', 'ItemController@getAllItems');
        Route::get('category', 'CategoryController@getAllCategories');
        Route::get('user','UserController@getAllUsers');
        // Route::get('order/{user}','OrderController@getUserOrders');
    });


    Route::group(['prefix'=>'auth'],function (){
        Route::post('login','UserController@login');
        Route::post('register','UserController@register');
    });
});