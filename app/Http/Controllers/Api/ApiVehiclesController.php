<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use App\Models\Vehicle;
use App\Models\VehicleComplement;
use App\Models\Driver;
use DB;
class ApiVehiclesController extends Controller
{
  public function Register(Request $request){
    DB::beginTransaction();
      try {
        $vehicle=new vehicle();
        $vehicle->placa=            $request->placa;
        $vehicle->veh_model=        $request->model;
        $vehicle->veh_motor=        $request->motor;
        $vehicle->veh_serie=        $request->serie;
        $vehicle->veh_vin=          $request->vin;
        $vehicle->veh_color=        $request->color;
        $vehicle->class_id=1;
        $vehicle->state_id=1;
        $vehicle->typevehicle_id=1;
        $vehicle->brand_id=1;
        $vehicle->baul_id=1;
        $vehicle->space_id=1;
        $vehicle->leveles_id=3;
        $vehicle->save();
        if ($vehicle->leveles_id==2 || $vehicle->leveles_id==3) {
              $complemt=New Vehiclecomplement();
              $complemt->id=$vehicle->id;
              $complemt->vc_brakes='dsad';
              $complemt->vc_Airbags='1';
              $complemt->vc_head='4';
              $complemt->vc_doors='4';
              $complemt->vc_cabin='4';
              $space='5';
              $complemt->vc_space=$space;
              $complemt->vc_passagers='7';
              $complemt->vc_sillateria='7';
              $complemt->vc_cellar='7';
              $complemt->typebodywork_id='1';
              $complemt->vc_cylinder='3';
              $complemt->vc_power='7';
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
