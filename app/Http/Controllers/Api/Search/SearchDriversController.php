<?php

namespace App\Http\Controllers\Api\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiDriversController as ApiDriver;
use App\Http\Controllers\Api\PushGoogle\SendDriverNotification as send_msg;
use App\Models\Passenger;
use DB;
use Illuminate\Support\Facades\Input;
class SearchDriversController extends Controller
{
    //Funcion de busqueda driver
    public function searchDriver(){
        $body   =Input::get('body');//Guardar
        $locU   =explode(",",Input::get('location'));
        $no     =explode(",",Input::get('rpt_no'));
        $driver=DB::select('SELECT id,dri_location FROM drivers WHERE apistate_id=1');
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
              return response()->json(['rpt'=>'No Found']);
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
            }

        $gettoken=new ApiDriver();
        $token=$gettoken->getTokenDriver($selectedID);
        $rpt=new send_msg();
        return $rpt->SendFirebase($token,$body);
    }
}
