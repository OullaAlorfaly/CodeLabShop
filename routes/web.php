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

Route::group(['middleware'=>'guest'],function (){

    Route::get('/register','RegisterController@getRegister');
    Route::post('/register','RegisterController@register')->name('auth.register');

    Route::get('/login','UserController@getLogin')->name('login');
    Route::post('/login','UserController@attemptLogin')->name('auth.login');
});

Route::group(['prefix' =>'dashboard', 'middleware'=>'auth.admin'] ,function (){
    Route::get('', 'HomeController@getDashboard');
    Route::get('', 'OrderController@getAllUserOrders');
    Route::get('', 'CategoryController@getCountAll');
    Route::get('order_delete/{order}', 'OrderController@orderDelete');
    Route::get('userOrders/userOrder_delete/{order}', 'UserController@userOrderDelete');
//Item

    Route::get('item', 'ItemController@getAllItems');
    Route::get('add_item', 'ItemController@getAddItemForm');
    Route::post('add_item/{item}', 'ItemController@addItem');
    Route::get('edit_item/{id}', 'ItemController@getItemUpdate');
    Route::post('edit_item/{item}', 'ItemController@itemUpdate');
    Route::get('item_delete/{item}', 'ItemController@itemDelete');
//category
    Route::get('category', 'CategoryController@getAllCategories');
    Route::post('category/{category}', 'CategoryController@addCategory');
    Route::get('edit_category/{id}', 'CategoryController@getCategoryUpdate');
    Route::post('edit_category/{category}', 'CategoryController@categoryUpdate');
    Route::get('category_delete/{category}', 'CategoryController@categoryDelete');

//user
    Route::get('user', 'UserController@getAllUsers');
    Route::get('userOrders/{user}', 'UserController@getUserOrders');
    Route::get('delete/{user}','UserController@userDelete');

});

//for user not admin
Route::group(['middleware'=>'auth.user'] ,function (){
    Route::get('/item', 'ItemController@getAllItems');
    Route::get('/see_item/{user}', 'ItemController@getItemById');

    Route::get('/search', 'ItemController@getSearch');
    Route::get('/search/{item}', 'ItemController@getInBetweenPrice');
    Route::post('/search/{item}', 'ItemController@getSearchItem');

    Route::get('/addToCard/{user}/{item}', 'OrderController@makeOrder');
    Route::post('/addToCard/order-now','OrderController@makeOrder');

    // get all orders here
    Route::get('/orders/all', 'OrderController@getAllOrders');
    Route::get('/orders/all/{user}', 'OrderController@getAllOrders');
    Route::get('/order/delete/{order}','OrderController@orderDelete');
    Route::get('/', 'HomeController@index');
    Route::post('/logout','UserController@logout');
    Route::get('/logout','UserController@logout')->name('logout');




});


Route::get('/about','HomeController@getAbout');