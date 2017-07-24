<?php

namespace App\Http\Controllers\Api\PushGoogle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use App\Models\Passenger;
use App\Models\Driver;
use Config;
class PushNotificationController extends Controller
{
    /**
     * Inserta el token a la db de passengers
     * @token: token recibido
     */
     public function InsertTokendPassengers(){
       $passengers = JWTAuth::parseToken()->authenticate();
       $token=Input::get('token');
       $passenger=Passenger::find($passengers->id);
       $passenger->token_api=$token;
       if ($passenger->save()) {
          return response()->json(['rpt'=>'success']);
       }else {
         return response()->json(['rpt'=>'error']);
       }

     }
     /**
      * Inserta el token a la db de drivers
      * @token: token recibido of driver
      */
     public function InsertTokendDrivers(){
       $driver = JWTAuth::parseToken()->authenticate();
       $token=Input::get('token');
       $driver=Driver::find($driver->id);
       $driver->token_api=$token;
       if ($driver->save()) {
          return response()->json(['rpt'=>'success']);
       }else {
         return response()->json(['rpt'=>'error']);
       }
       }
       /**
        * Función que recibe el id del conductor y extrae el token de firebase
        * @id id del Conductores
        */
        public function getTokenDriver($id){
          return  "holaaaa".$id;
        }


}
