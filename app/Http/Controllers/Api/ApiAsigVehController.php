<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Driver;
use JWTAuth;
use DB;

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

        //$driver = JWTAuth::parseToken()->authenticate();
        try {
          $driver=$request->driver_id;// id del vehiculo seleccionado
          $vehicle_id=$request->vehicle_id;//id del vehiculo
          $vehicle=vehicle::find($vehicle_id);
          $query=DB::SELECT('select count(*) as sum from driver_vehicle where vehicle_id=? and opt=?', array($vehicle_id,1) );
          if ($query[0]->sum==0) {
            $vehicle->drivers()->updateExistingPivot($driver,['opt'=>'1'],false);//Acualiza
            return response()->json(['rpt'=>'success']);
          }else {
            return response()->json(['rpt'=>'selected']);
          }
        } catch (\Exception $e) {
          return response()->json(['rpt'=>'error']);
        }
        }
     public function destroyAsign(Request $request){
       try {
         $driver=$request->driver_id;
         $vehicle=$request->vehicle_id;
         $query=DB::SELECT('update driver_vehicle set opt=0  WHERE driver_id=? and vehicle_id=?',array($driver,$vehicle));
         return response()->json(['rpt'=>'success']);
       } catch (\Exception $e) {
         return response()->json(['rpt'=>'Error']);
       }


     }

  }






      // $vehicle->drivers()->sync((array) $request->driver);SEPARATOR '"'/'"'
      //echo 'vehicle +>'.$request->vehicle.'DRIVER ->'.$request->driver;
