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
    return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', 'PanelController@index');
Route::get('/graph', 'PanelController@graph');
Route::get('/frm_create_driver', 'Dashboard\FormsController@frm_create_driver');
Route::group(['namespace' => 'Web'], function () {
    //Función que muestra la interfaz del modulo de mensajes
    Route::get('drivers/msg/', 'DriversController@sendMsg');
    //Función que envia el mesaje
    Route::post('drivers/broadcastmsg/', 'DriversController@broadcastMsg');
    //Función que muestra los vehiculos por Conductor
    Route::post('drivers/vehicles', 'DriversController@getVehicles');
    Route::post('drivers/msg/', 'DriversController@getToMsg');
    Route::get('drivers/getdriver/', 'DriversController@getDriver');
    Route::post('/drimages/store','DriImagesController@store');
    Route::resource('/drivers', 'DriversController');
    Route::delete('/drimages/{id}/delete','DriImagesController@destroy');


    //Imágenes de drivers
  //  Route::post('/drimages/store','DriImagesController@store');


    Route::resource('users', 'UsersController');


    Route::post('drivers/{id}/update/photo', 'DriversController@updatePhoto');


    Route::get('passengers/view', 'PassengersController@viewdata');
    Route::resource('passengers', 'PassengersController');



    //--Vehículos
    //Rutas de vehículos tipo taxi
    Route::get('vehicles', 'VehiclesController@index');
    Route::get('vehicles/create', 'VehiclesController@create');
    Route::post('vehicles/tax', 'VehiclesController@store');
    Route::get('vehicles/{id}/edit','VehiclesController@edit');
    Route::put('vehicles/{id}','VehiclesController@update');

    Route::delete('vehicles/{id}', 'VehiclesController@destroy');

    //Rutas de vehículos tipo luxury
    Route::delete('vehicles/luxury/{id}', 'VehiclesController@destroyLuxury');
    Route::post('vehicles/luxury', 'VehiclesController@StoreLuxury');
    Route::get('vehicles/luxury', 'VehiclesController@indexluxury');
    Route::get('vehicles/{id}/show', 'VehiclesController@show');
    Route::put('vehiclesluxury/{id}','VehiclesController@updateLuxury');

    //Rutas de vehículos tipo premiun
    Route::get('vehicles/premium', 'VehiclesController@indexPremium');


    //Route::post('vehicles/premium', 'VehiclesController@StorePremium');



    //--Vehículos
    //Rutas de imaenes
    Route::get('vehimages/{id}/create','VehImagesController@create');
    Route::post('vehimages/store','VehImagesController@store');
    Route::delete('vehimages/{id}/delete','VehImagesController@destroy');
    //documents
    Route::get('documents/{id}/create', 'DocumentsController@create');
    Route::post('/documents/store', 'DocumentsController@store');
    Route::delete('/documents/{id}/delete', 'DocumentsController@destroy');
    Route::put('/documents/{id}/update', 'DocumentsController@update');
    Route::get('documents/docexpitared','DocumentsController@docuExpired');
    Route::get('documents/expitared','DocumentsController@expirated');
    
    //Asignación
    Route::get('asig', 'AsigVehDriController@create');
    Route::post('asig/create', 'AsigVehDriController@ToAsign');
    Route::delete('asig/delete/{id}/{placa}', 'AsigVehDriController@destroy');


    //Tarjeta de control
    Route::get('tcontrol', 'TcontrolController@index');
    Route::post('tcontrol/search', 'TcontrolController@searchDriver'); //Busca conductor
    Route::post('tcontrol/store', 'TcontrolController@store'); //Inserta Conductor
    Route::delete('tcontrol/{id}/delete', 'TcontrolController@destroy'); //Eliminat tarjeta de control
    Route::put('tcontrol/{id}/update', 'TcontrolController@update'); //Eliminat tarjeta de control

    //Seguro
    Route::resource('insurance','InsuranceController');

    //Historial
    Route::get('history', 'HistoryController@viewHistory');
    Route::get('gethistory', 'HistoryController@getDataHistory');

    //Publicidad
    Route::resource('images', 'AdvertisingController');

    //solicitudes
    Route::resource('requests','RequestsController');


    /**
     * Reportes
     */
    Route::get('/reports','ReportsController@index');
    Route::post('/reports/driver','ReportsController@rportDriver');
    Route::get('/pdf',function(){
      $pdf=\PDF::loadView('vista');
      return $pdf->download('jejeje.pdf');
    });
});
