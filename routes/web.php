<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BorderController;


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
// for border
Route::prefix('border')->group(function () {
    Route::get('/create','BorderController@create');
    Route::post('/store/','BorderController@store');
    Route::get('/view/','BorderController@index');
    Route::get('/edit/{id}','BorderController@edit');
    Route::post('/update/{id}','BorderController@update');
    Route::get('/delete/{id}','BorderController@destroy');
});
// for room
Route::prefix('room')->group(function () {
    Route::get('/create','RoomController@create');
    Route::post('/store','RoomController@store');
    Route::get('/view/','RoomController@index');
    Route::get('/edit/{id}','RoomController@edit');
    Route::post('/update/{id}','RoomController@update');
    Route::get('/delete/{id}','RoomController@destroy');
});
// for meals
Route::prefix('meals')->group(function () {
    Route::get('/create','MealController@create');
    Route::post('/store','MealController@store');
    Route::get('/view','MealController@index');
    Route::get('/edit/{id}','MealController@edit');
    Route::post('/update/{id}/','MealController@update');
    Route::get('/{id}/delete','MealController@destroy');
});

// for order meals and pay meals price daily
Route::prefix('order')->group(function () {
    Route::get('/view','OrderController@index');
    Route::get('/report','OrderController@report');
});
// cart controller
Route::post('/add-cart','CartController@index');
Route::post('/cart-update/{rowId}','CartController@CartUpdate');
Route::get('/cart-remove/{rowId}','CartController@CartRemove');
// meals invoice
Route::post('/invoice','CartController@CreateInvoice');
Route::post('/final-invoice','CartController@FinalInvoice');

