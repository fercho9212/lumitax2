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

}
