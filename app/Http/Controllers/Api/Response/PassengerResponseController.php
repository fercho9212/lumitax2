<?php

namespace App\Http\Controllers\Api\Response;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//MSG
use App\Http\Controllers\Api\ApiDriversController as APIDriver;
use App\Http\Controllers\Api\GoogleCloudMsg\PushController as Push;
use App\Http\Controllers\Api\GoogleCloudMsg\DriversCloudMsg as DriversCloud;
use Illuminate\Support\Facades\Input;

class PassengerResponseController extends Controller
{

  public function ResponseService(){
    $push =new Push;
    $data=Input::get('body');
    $to=Input::get('token');
    //Envia al Pasajero
    $DriversCloud=new DriversCloud;
    $push->setData($data);
    $rpt=$DriversCloud->send($to,$push->getPush());
    return response()->json($rpt);
  }

}
