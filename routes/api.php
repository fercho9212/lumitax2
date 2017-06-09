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
/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('/v1/prueba', 'Dashboard\PassengersController')->middleware('auth:api');
Route::get('/hola', function (Request $request) {
    return 'hola';
})->middleware('auth:api');
*/
Route::get('/user', function (Request $request) {
    return 'dasd';
})->middleware('api');



Route::group(['prefix'=>'v1/passengers'],function(){
   // Funciones del Login
    Route::get('/','Api\LoginApiController@showLoginForm');
    Route::post('/','Api\LoginApiController@login');

    //Funciones para registrar
    Route::get('/register','Api\LoginApiController@register');
});
