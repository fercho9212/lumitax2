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
Route::get('/',function(){
  echo "Comunication success";
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('jwt.auth');

//Route::post('authenticate','Api\UserController@authenticate');
/**
 * Route Passenger
 */
Route::group(['prefix'=>'v1/passengers'],function(){
    Route::post('/auth','Api\ApiAuthpassenger@authenticate');
    Route::post('/register','Api\ApiAuthpassenger@register');
    Route::post('/profile','Api\ApiPassengersController@profile')->middleware('passenger');
    Route::post('/test','Api\ApiAuthpassenger@test')->middleware('passenger');
    Route::get('/',function(){
      echo "string";
    });
});
/**
 * Route Drivers
 */
Route::group(['prefix'=>'v1/drivers'],function(){
    Route::post('/auth','Api\ApiAuthdriver@authenticate');
    Route::post('/profile','Api\ApiDriversController@profile')->middleware('driver');
    //Route::post('/test','Api\ApiAuthdriver@test')->middleware('driver');




    //Funcion que asigna un vehiculo al conductor resive un token
    Route::post('/assignvehicle','Api\ApiAsigVehController@show')->middleware('driver');

    Route::post('/selectvehicle','Api\ApiAsigVehController@ToAsign')->middleware('driver');

    //function que actualiza la localización del conductor
    Route::PUT('/update/location','Api\ApiDriversController@UpdateLocation')->middleware('driver');


    //Función que trae el estado del conductor
    Route::post('get/state','Api\ApiDriversController@getState')->middleware('driver');

    //Funcion que resibe la accion todada del conductor

    Route::post('set/state','Api\ApiDriversController@setState')->middleware('driver');

    Route::get('/',function(){
      echo "string";
    });

});
Route::group(['prefix'=>'v1/push'],function(){
    Route::post('/passenger','Api\PushGoogle\PushNotificationController@InsertTokendPassengers')->middleware('passenger');
    Route::post('/driver','Api\PushGoogle\PushNotificationController@InsertTokendDrivers')->middleware('driver');
    Route::post('send/{}/{}','Api\PushGoogleSendNotificationController@Send');
});

Route::group(['prefix'=>'v1/search'],function(){
  Route::post('/','Api\Search\SearchDriversController@search')->middleware('passenger');
});
