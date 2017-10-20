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
    //Verifica si existe un correo
    Route::post('/verifyemail','Api\ApiPassengersController@verifyemail');
    //Atualiza el passwor
    Route::post('/setemail','Api\ApiPassengersController@updateemail');

    Route::post('/profile','Api\ApiPassengersController@profile')->middleware('passenger');
    Route::post('/view/history','Api\ApiHistoryController@viewHistoryPassenger')->middleware('passenger');
    Route::post('/test','Api\ApiAuthpassenger@test')->middleware('passenger');
    //Calificación
    Route::post('/qualification','Api\ApiPassengersController@Qualification')->middleware('passenger');

    Route::post('/qualification','Api\ApiPassengersController@Qualification')->middleware('passenger');
    //Función que guarda las solicitudes del pasajero
    Route::post('/request','Api\ApiPassengersController@Request')->middleware('passenger');
});
/**
 * Route Drivers
 */
Route::group(['prefix'=>'v1/drivers'],function(){
    Route::post('/auth','Api\ApiAuthdriver@authenticate');
    //Verifica si existe un correo
    Route::post('/verifycc','Api\ApiDriversController@verifyemail');
    //actualiza password
    Route::post('/updateemail','Api\ApiDriversController@updateemail');
    //función foto de perfil del conductor
    Route::post('/photo','Api\ApiDriversController@updatePhoto');
    //función que sube documentos del conductor
    Route::post('/imgdoc','Api\ApiDriversController@upDocuments');
    //Función que sube los documentos del vehículo registrado por el conductor
    Route::post('/docvehicle','Api\ApiVehiclesController@upDocuments');

    Route::post('/profile','Api\ApiDriversController@profile')->middleware('driver');
    Route::post('/history','Api\ApiHistoryController@saveHistory')->middleware('driver');
    Route::post('/view/history','Api\ApiHistoryController@viewHistoryDriver')->middleware('driver');
    //Route::post('/test','Api\ApiAuthdriver@test')->middleware('driver');

    //funcion documentos vencidos
    Route::post('/documents','Api\ApiDocumentsController@documents')->middleware('driver');

    //funcion licencias vencidos
    Route::post('/licences','Api\ApiDocumentsController@licences')->middleware('driver');



    //Funcion que asigna un vehiculo al conductor resive un token
    Route::post('/assignvehicle','Api\ApiAsigVehController@show')->middleware('driver');

    Route::post('/selectvehicle','Api\ApiAsigVehController@ToAsign')->middleware('driver');

    //Destruye asignación
    Route::post('/destroyveh','Api\ApiAsigVehController@destroyAsign')->middleware('driver');

    //Función que asigna un conductor automaticamente con el vehículo inscrito
    Route::post('/assign','Api\ApiAsigVehController@ToAsignApi');


    //function que actualiza la localización del conductor
    Route::PUT('/update/location','Api\ApiDriversController@UpdateLocation')->middleware('driver');


    //Función que trae el estado del conductor
    Route::post('get/state','Api\ApiDriversController@getState')->middleware('driver');

    //Funcion que resibe la accion todada del conductor

    Route::post('set/state','Api\ApiDriversController@setState')->middleware('driver');

    Route::get('/',function(){
      echo "/";
    });

    //Calificación
    Route::post('/qualification','Api\ApiDriversController@Qualification')->middleware('driver');


    //Publicidad
    Route::post('/imgp','Api\ApiDriversController@Advertising')->middleware('driver');

    //registro del conductor
    Route::post('/register','Api\ApiDriversController@Register');

    //Registra un vehículo
    Route::post('/register/vehicle','Api\ApiVehiclesController@Register');
    Route::post('/register/vehicle/img','Api\ApiVehiclesController@RegisterImgs');


});

///REQUEST
Route::group(['prefix'=>'v1/push'],function(){
    Route::post('/driver','Api\ApiDriversController@InsertTokendDrivers')->middleware('driver');
    Route::post('/passenger','Api\ApiPassengersController@InsertTokendPassengers')->middleware('passenger');
});


//Fin Funciones MENSAJERIA

//FUNCIONES DE ENVIO DE SERVICIO
Route::group(['prefix'=>'v1/search'],function(){
  Route::post('/','Api\Search\SearchDriversController@SendService')->middleware('passenger');//Funciion principal de busquedad
});

//RESPONSE DE MESNAJES
Route::group(['prefix'=>'v1/response/push'],function(){
  Route::post('drivers','Api\Response\DriverResponseController@ConfirmateService')->middleware('driver');
  Route::post('passengers','Api\Response\PassengerResponseController@ResponseService')->middleware('passenger');
});
