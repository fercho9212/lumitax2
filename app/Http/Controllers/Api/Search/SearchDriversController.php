<?php

namespace App\Http\Controllers\Api\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiDriversController as ApiDriver;
use App\Http\Controllers\Api\PushGoogle\SendNotificationController as send_msg;
use App\Models\Passenger;
use DB;
use Illuminate\Support\Facades\Input;
class SearchDriversController extends Controller
{
    public function search(){
        //$driver=Driver::select('dri_location')->get();
        //return response()->json(['da'=>$driver]);
        $request=Input::get('request');//Guardar
        //Input::get('location')
        //'4.67835258,-74.0939215'
        $locU=explode(",",Input::get('location'));

        $no=explode(",",Input::get('rpt_no'));

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
        $gettoken=new ApiDriver();
        $token=$gettoken->getTokenDriver($selectedID);
        $rpt=new send_msg();
        return $rpt->SendMsgPassenger($token,$request);
        //$array = explode(",", $placa);
        //$last=array_pop($array);

        /*
        $arr=array();//Guardar Conductores respuesnta No
        $free=array();

        */
    }
}