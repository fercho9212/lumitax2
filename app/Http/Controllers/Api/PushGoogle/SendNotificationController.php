<?php

namespace App\Http\Controllers\Api\PushGoogle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use App\Models\Passenger;
use App\Models\Driver;
use Config;

class SendNotificationController extends Controller
{

    public function SendMsgP($msg,$token){
      $url = 'https://fcm.googleapis.com/fcm/send';
      $fields=array(
              'registration_ids'=>$token,
              'data'=>$message;
      );
    }
    $headers= array(){
              'Authorization:key=
                  AIzaSyCwjzuDJbJOLzpvbk4iGOerSjC7c_yQAYM',
              'Content-Type: application/json'
    }
    $fields = json_encode ( $fields );
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
    $result = curl_exec ( $ch );
    echo $result;
    curl_close ( $ch );

}
