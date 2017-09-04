<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Models\Vehicle;
use App\Models\VehicleComplement;
use App\Models\Driver;
use DB;
class ApiVehiclesController extends Controller
{
  public function Register(Request $request){
    $validator = Validator::make($request->all(), [
      'placa'           => 'required|max:6|unique:vehicles,placa',
      'veh_model'       => 'required|max:4',
      'space_id'        => 'required|max:1',
      'baul_id'         => 'required|max:1',
      'veh_serie'       => 'required|max:15',
      'veh_color'       => 'required|max:15',
      'brand_id'        => 'required|max:15',
      'leveles_id'      => 'required|max:1',
      'typevehicle_id'  => 'required|max:1',
    ]);
    if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors(),'rpt'=>'error'], 200);
    }
    DB::beginTransaction();
    try {
      $vehicle=new vehicle();
      $vehicle->placa=            $request->placa;
      $vehicle->veh_model=        $request->veh_model;
      $vehicle->veh_motor=        'No registra';
      $vehicle->veh_serie=        'No registra';
      $vehicle->veh_vin=          'No registra';
      $vehicle->veh_color=        'No registra';
      $vehicle->class_id=         $request->class_id;
      $vehicle->state_id=         2;
      $vehicle->typevehicle_id=   $request->typevehicle_id;
      $vehicle->brand_id=         $request->brand_id;
      $vehicle->baul_id=          $request->baul_id;
      $vehicle->space_id=         $request->space_id;
      $vehicle->leveles_id=       $request->leveles_id;
      $vehicle->register_id=      2;
      $vehicle->save();
      if ($vehicle->leveles_id==2 || $vehicle->leveles_id==3) {
            $complemt=New Vehiclecomplement();
            $complemt->id=              $vehicle->id;
            $complemt->vc_brakes=       'No registra';
            $complemt->vc_Airbags=      '1';
            $complemt->vc_head=         '0';
            $complemt->vc_doors=        '0';
            $complemt->vc_cabin=        'No registra';
            $space='0*0';
            $complemt->vc_space=         $space;
            $complemt->vc_passagers=     '0';
            $complemt->vc_sillateria=    'No registra';
            $complemt->vc_cellar=        'No registra';
            $complemt->typebodywork_id=   NULL;
            $complemt->vc_cylinder=      'No registra';
            $complemt->vc_power=         'No registra';
            $vehicle->vehiclecomplement()->save($complemt);
      }
      DB::commit();
      return response()->json(['rpt'=>'success']);
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['rpt'=>'error try']);
    }



    }
}
