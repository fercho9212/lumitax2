<?php

namespace App\Http\Controllers\Api\Response;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//MSG
use App\Http\Controllers\Api\ApiDriversController as APIDriver;
use App\Http\Controllers\Api\GoogleCloudMsg\PushController as Push;
use App\Http\Controllers\Api\GoogleCloudMsg\PassengersCloudMsg as PassengerCloud;
use Illuminate\Support\Facades\Input;

class DriverResponseController extends Controller
{
    public function ConfirmateService(){
      $push =new Push;
      //Envia al Pasajero
      $PassengerCloud=new PassengerCloud;
      $data=Input::get('body');
      $to=Input::get('token');
      $push->setData($data);
      $rpt=$PassengerCloud->send($to,$push->getPush());
      return response()->json($rpt);
    }
}
