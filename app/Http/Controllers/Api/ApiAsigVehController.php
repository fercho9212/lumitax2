<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Driver;
use JWTAuth;

class ApiAsigVehController extends Controller
{
    public function show(){
      $driver = JWTAuth::parseToken()->authenticate();
      $drivers=Driver::find($driver->id);
      $rpt=[];
        foreach ($drivers->vehicles as $vehicle) {
           $rpt[]=array('id'=>$vehicle->id,'placa'=>$vehicle->placa);
        }
        return response()->json($rpt);

    }
    public function ToAsign(Request $request){
      try {
        $driver = JWTAuth::parseToken()->authenticate();
        $driver=$driver->id;// id del vehiculo seleccionado
        $vehicle_id=$request->vehicle_id;//id del vehiculo
        $vehicle=vehicle::find($vehicle_id);
        $vehicle->drivers()->updateExistingPivot($driver,['select'=>'1'],false);//Acualiza
        return response()->json(['rpt'=>'success']);
      } catch (\Throwable $e) {
         echo "Error";
      }



      // $vehicle->drivers()->sync((array) $request->driver);SEPARATOR '"'/'"'
      //echo 'vehicle +>'.$request->vehicle.'DRIVER ->'.$request->driver;

    }

}
