<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Vehicle;
use DB;

class AsigVehDriController extends Controller
{

    public function create(){
      $drivers=DB::table('drivers')->select('id','dri_cc as cc','dri_name as name')->get();
      $vehicles=DB::table('vehicles')->select('id','placa','veh_model as model')->get();
      $sql='';
      $sql.=' SELECT d.id, d.dri_cc,d.dri_name,GROUP_CONCAT(DISTINCT(v.placa)) AS placa ';
      $sql.=' FROM drivers d INNER JOIN driver_vehicle dv ON d.id=dv.driver_id ';
      $sql.= ' INNER JOIN vehicles v ON v.id=dv.vehicle_id  GROUP BY d.id ';
      $driveh=DB::select($sql);

      return view('panel.modules.veh_driver.index',['drivers'=>$drivers,
                                                    'vehicles'=>$vehicles,
                                                    'drivehs'=>$driveh]);
    }
    public function ToAsign(Request $request){
      $vehicle=Vehicle::find($request->vehicle);
      $vehicle->drivers()->attach($request->driver);


      // $vehicle->drivers()->sync((array) $request->driver);SEPARATOR '"'/'"'
      //echo 'vehicle +>'.$request->vehicle.'DRIVER ->'.$request->driver;

    }
    public function list(){
      
//
    }

}
