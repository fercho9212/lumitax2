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
Route::get('/frm_create_driver', 'Dashboard\FormsController@frm_create_driver');
Route::group(['namespace' => 'web'], function () {

    Route::resource('drivers', 'DriversController');
    Route::resource('passengers', 'PassengersController');


    //--Vehículos
    //Rutas de vehículos tipo taxi
    Route::get('vehicles', 'VehiclesController@index');
    Route::get('vehicles/create', 'VehiclesController@create');
    Route::post('vehicles/tax', 'VehiclesController@store');
    Route::get('vehicles/{id}/edit','vehiclesController@edit');
    Route::delete('vehicles/{id}', 'VehiclesController@destroy');

    //Rutas de vehículos tipo Lujo
    Route::delete('vehicles/luxury/{id}', 'VehiclesController@destroyLuxury');
    Route::post('vehicles/luxury', 'VehiclesController@StoreLuxury');
    Route::get('vehicles/luxury', 'VehiclesController@indexluxury');
    Route::get('vehicles/{id}/show', 'VehiclesController@show');
    //--Vehículos
    //
    //documents
    Route::get('documents/{id}/create', 'DocumentsController@create');


    //Asignación
    Route::get('asig', 'AsigVehDriController@create');
    Route::post('asig/create', 'AsigVehDriController@ToAsign');
    Route::delete('asig/delete/{id}/{placa}', 'AsigVehDriController@destroy');
});
