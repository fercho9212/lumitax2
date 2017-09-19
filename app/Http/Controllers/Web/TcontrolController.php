<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\State;
use App\Models\Tcontrol;
use DB;
use App\Http\Requests\Web\TcontrolRequest;

class TcontrolController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){

    $drivers=DB::table('drivers')->select('id','dri_cc as cc','dri_name as name')->get();
    $states=State::all();
    $dvs=DB::SELECT('select dv.id,d.id as iddriver,v.id as idvehicle,d.dri_name,d.dri_cc,v.placa,dv.dv_no,dv_nit,dv.dv_date_ex,dv.dv_date_ven,s.id as idstate,s.state from driver_vehicle dv INNER JOIN drivers d on dv.driver_id=d.id INNER JOIN vehicles v on v.id=dv.vehicle_id LEFT OUTER JOIN states s ON s.id=dv.state_id  ORDER BY d.dri_name');
    return view('panel.modules.tcontrol.index',['drivers'=>$drivers,'dvs'=>$dvs,'states'=>$states]);

  }
  public function searchDriver(Request $request){
    $vehicles=Vehicle::all();
    $driver=DB::select('select * from drivers where id=?',array($request->id));
    $states=State::all();
    return response()->json(['rpt'=>$driver,'states'=>$states,'vehicles'=>$vehicles]);
  }

    public function create(){
      $drivers=DB::table('drivers')->select('id','dri_cc as cc','dri_name as name')->get();
      $vehicles=DB::table('vehicles')->select('id','placa','veh_model as model')->get();
      $sql='';
      $sql.=' SELECT d.id, d.dri_cc,d.dri_name, GROUP_CONCAT(DISTINCT(v.placa)) AS placa ';
      $sql.=' FROM drivers d INNER JOIN driver_vehicle dv ON d.id=dv.driver_id ';
      $sql.= ' INNER JOIN vehicles v ON v.id=dv.vehicle_id  GROUP BY d.id ';
      $driveh=DB::select($sql);

      return view('panel.modules.veh_driver.index',['drivers'=>$drivers,
                                                    'vehicles'=>$vehicles,
                                                    'drivehs'=>$driveh]);
    }
    public function store(TcontrolRequest $request){
      try {
        $vehicle=Vehicle::findOrFail($request->dv_vehicle);
        $driver=Driver::findOrFail($request->dv_driver);
        $tcontrol=New Tcontrol();
        $tcontrol->driver_id=$driver->id;
        $tcontrol->vehicle_id=$vehicle->id;
        $tcontrol->dv_no=$request->dv_no;
        $tcontrol->dv_nit=$request->dv_nit;

        if ($request->dv_state!='') {
          $tcontrol->state_id=$request->dv_state;
        }
        if ($request->dv_date_f!='') {
          $tcontrol->dv_date_ven=$request->dv_date_f;
        }
        if ($request->dv_date_e!='') {
          $tcontrol->dv_date_ex=$request->dv_date_e;
        }
        if ($tcontrol->save()) {
            return response()->json(['rpt'=>'success']);
        }else {
            return response()->json(['rpt'=>'error']);
        }
      } catch (\Illuminate\Database\QueryException $e) {
        return $e->errorInfo[1]; //Envia el error de duplicidad
      }



      }





    public function ToAsign(Request $request){
      $vehicle=Vehicle::find($request->vehicle);
      $vehicle->drivers()->attach($request->driver);


      // $vehicle->drivers()->sync((array) $request->driver);SEPARATOR '"'/'"'
      //echo 'vehicle +>'.$request->vehicle.'DRIVER ->'.$request->driver;

    }

  /*  public function destroy($id,$placa)
    {

       $array = explode(",", $placa);
       $last=array_pop($array);
       //DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") )
       $idv=DB::select("SELECT id FROM vehicles WHERE placa='$last'");
       $driver = Driver::find($id);
       $driver->vehicles()->detach($idv[0]->id);
       echo 'ok';

    }
*/
    public function destroy($id)
    {
      try {
        $control=Tcontrol::findOrFail($id);
        if ($control->delete()) {
           return response()->json(['rpt'=>'success']);
        }else {
            return response()->json(['rpt'=>'error']);
        }
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'error try']);
      }
    }
    public function update(Request $request, $id)
    {
      try {
        $control=Tcontrol::findOrFail($id);
        $control->dv_no=$request->dv_no;
        $control->dv_nit=$request->dv_nit;
        if ($request->dv_state!='') {
          $control->state_id=$request->dv_state;
        }else {
          $control->state_id=NULL;
        }
        if ($request->dv_date_e!='') {
          $control->dv_date_ex=$request->dv_date_e;
        }if ($request->dv_date_f!='') {
          $control->dv_date_ven=$request->dv_date_f;
        }
        if ($control->save()) {
          return response()->json(['rpt'=>'success']);
        }else {
          return response()->json(['rpt'=>'error']);
        }
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'error try']);
      }




    }


}
