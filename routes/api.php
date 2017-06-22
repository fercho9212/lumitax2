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
<<<<<<< HEAD
})->middleware('jwt.auth');

Route::post('authenticate','Api\UserController@authenticate');

Route::group(['prefix'=>'v1/passengers'],function(){
    Route::post('/','Api\ApiAuthpassenger@authenticate');
    Route::post('/register','Api\ApiAuthpassenger@register');
    Route::post('/test','Api\ApiAuthpassenger@test')->middleware('passenger');
    Route::get('/',function(){
      echo "string";
    });
});

Route::group(['prefix'=>'v1/drivers'],function(){
    Route::post('/','Api\ApiAuthdriver@authenticate');
    Route::post('/test','Api\ApiAuthdriver@test')->middleware('passenger');
    Route::get('/',function(){
      echo "string";
    });
=======
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
>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
});
