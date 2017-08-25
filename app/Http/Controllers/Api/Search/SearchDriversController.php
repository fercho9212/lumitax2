<?php

namespace App\Http\Controllers\Api\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiDriversController as APIDriver;
use App\Http\Controllers\Api\PushGoogle\SendDriverNotification as send_msg;
use App\Http\Controllers\Api\GoogleCloudMsg\PushController as Push;
use App\Http\Controllers\Api\GoogleCloudMsg\DriversCloudMsg as DriverCloud;

use App\Models\Passenger;
use App\Models\Driver;
use DB;
use Illuminate\Support\Facades\Input;
class SearchDriversController extends Controller
{
    //Funcion de busqueda driver
    public function searchDriver($locU,$no,$baul,$space,$type){

        $sql="";
        $sql.=" SELECT ";
        $sql.="	d.id, d.dri_location ";
        $sql.=" FROM drivers d ";
        $sql.=" INNER JOIN driver_vehicle dv ON d.id = dv.driver_id ";
        $sql.=" INNER JOIN vehicles v ON dv.vehicle_id = v.id ";
        $sql.=" WHERE ";
        $sql.=" (v.baul_id = ? AND v.space_id = ?) AND (d.apistate_id=1) AND(dv.opt=1)";
        $sql.=" AND (v.leveles_id = ?)";
        $driver=DB::SELECT($sql,array($baul,$space,$type));

        foreach ($driver as $dri) {
                $a=true;
                foreach ($no as $key) {
                    if ($key==$dri->id) {
                        $a=false;
                    }
                  }
                  if ($a) {
                    $free[]=$dri->id.';'.$dri->dri_location;
                  }
              }
        $minDis=100000000;
        $selectedID="";

      if(empty($free)) {
          return 0;
        }else {
                  foreach ($free as $value) {
                    $locationDriver=explode(";", $value);
                    $locD=explode(",", $locationDriver[1]);
                    $latU=floatval($locU[0]);
                    $lngU=floatval($locU[1]);
                    $latD=floatval($locD[0]);
                    $lngD=floatval($locD[1]);
                    $dist=sqrt(pow(($latU-$latD),2) + pow(($lngU-$lngD),2));
                    if($dist<$minDis){
                      $minDis=$dist;
                      $selectedID=$locationDriver[0];
                    }
                  }
                  return  $selectedID;
            }

    }

    public function SendService(){
      $push   = new Push();
      $DriverCloud= new DriverCloud();
      $driver= new APIDriver();

      $body   =Input::get('body');//Guardar
      $locU   =explode(",",Input::get('location'));
      $no     =explode(",",Input::get('rpt_no'));
      $space=  Input::get('space');
      $baul =  Input::get('baul');
      $type =  Input::get('type');
      $idSerach=$this->searchDriver($locU,$no,$baul,$space,$type);
     if ($idSerach!=null) {
        $to=$driver->getTokenDriver($idSerach);
        $push->setData($body);
        $rpt=$DriverCloud->send($to,$push->getPush());
        return response()->json($rpt);
      }else {
        return response()->json(['rpt'=>'error','result'=>'none']);
      }
    }
}
