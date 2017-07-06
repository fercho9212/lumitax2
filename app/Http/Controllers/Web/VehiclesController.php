<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Vehiclecomplement;

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
      $vehicle= New Vehicle();
      $vehicle->placa     =$request->veh_placa;
      $vehicle->veh_model =$request->veh_model;
      $vehicle->veh_motor =$request->veh_motor;
      //$vehicle->serie     =$request->veh_serie;
      $vehicle->veh_serie =$request->veh_serie;
      $vehicle->veh_vin   =$request->veh_vin;
      $vehicle->veh_color =$request->veh_color;
      $vehicle->brands_id =$request->brands_id;
      $vehicle->class_id  =$request->class_id ;
      if ($request->veh_service=='1') {
              $vehicle->save();
              $rpt='Vehiculo de taxi registrado';
      }elseif ($request->veh_service=='2') {
              $vehicle->save();
              $complemt=New Vehiclecomplement();
              $complemt->id=$vehicle->id;
              $complemt->vc_brakes=$request->vc_brakes;
              $complemt->vc_Airbags=$request->vc_airbags;
              $complemt->vc_head=$request->vc_head;
              $complemt->vc_doors=$request->vc_doors;
              $complemt->vc_cabin=$request->vc_cabin;
              $complemt->vc_space=$request->vc_space;
              $complemt->vc_passagers=$request->vc_passagers;
              $complemt->vc_sillateria=$request->vc_sillateria;
              $complemt->vc_cellar=$request->vc_cellar;
              $complemt->vc_typebodyworks=$request->vc_typebodyworks;
              $complemt->vc_cylinder=$request->vc_cylinder;
              $complemt->vc_power=$request->vc_power;
              $vehicle->vehiclecomplement()->save($complemt);
              $rpt='Vehiculo de lujo registrado';
      }
        return response()->json(['rpt'=>$rpt]);

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
