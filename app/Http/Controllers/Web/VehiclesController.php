<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.modules.vehicle.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request->all());
      //echo $request->all();
      if ($request->veh_service=='1') {
          $vehicle= New Vehicle();
          $vehicle->placa     =$request->veh_placa;
          $vehicle->veh_model =$request->veh_model;
          $vehicle->veh_motor =$request->veh_motor;
          //$vehicle->serie     =$request->veh_serie;
          $vehicle->veh_serie =$request->veh_serie;
          $vehicle->veh_vin   =$request->veh_vin;
          $vehicle->veh_color =$request->veh_color;
          $vehicle->brands_id =$request->brands_id;
          $vehicle->veh_line  =$request->veh_line;
          $vehicle->save();
      }
        return response()->json(['dat'=>$request->all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
