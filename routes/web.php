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
    Route::get('drivers/msg/', 'DriversController@sendMsg');
    Route::post('drivers/msg/', 'DriversController@getToMsg');
    Route::resource('drivers', 'DriversController');


    Route::resource('users', 'UsersController');


    Route::post('drivers/{id}/update/photo', 'DriversController@updatePhoto');


    Route::get('passengers/view', 'PassengersController@viewdata');
    Route::resource('passengers', 'PassengersController');



    //--Vehículos
    //Rutas de vehículos tipo taxi
    Route::get('vehicles', 'VehiclesController@index');
    Route::get('vehicles/create', 'VehiclesController@create');
    Route::post('vehicles/tax', 'VehiclesController@store');
    Route::get('vehicles/{id}/edit','vehiclesController@edit');
    Route::put('vehicles/{id}','vehiclesController@update');

    Route::delete('vehicles/{id}', 'VehiclesController@destroy');

    //Rutas de vehículos tipo luxury
    Route::delete('vehicles/luxury/{id}', 'VehiclesController@destroyLuxury');
    Route::post('vehicles/luxury', 'VehiclesController@StoreLuxury');
    Route::get('vehicles/luxury', 'VehiclesController@indexluxury');
    Route::get('vehicles/{id}/show', 'VehiclesController@show');
    Route::put('vehiclesluxury/{id}','vehiclesController@updateLuxury');

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
});
