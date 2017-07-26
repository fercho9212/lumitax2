<?php

namespace App\Http\Controllers\Api\PushGoogle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use App\Models\Passenger;
use App\Models\Driver;
use Config;

class SendDriverNotification extends Controller
{
    private $api_key='AIzaSyAHs5VIqpl4KSZyOJo5hN9KcnhmLhwclEg';
    private $url    ='https://fcm.googleapis.com/fcm/send';

    public function SendFirebase($tokenfi,$body){
        $msg=array(
                  'body'  =>  $body,
                 );
        $fields=array(
                  'to'=>$tokenfi,
                  'data'=>$msg,
        );
        $headers=array(
                  'Authorization: key='.$this->api_key,
                  'Content-Type: application/json',
        );

        //Function convert url
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $this->url );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return response()->json(['tknfbdDriver'=>$tokenfi,'rptfirebase'=>$result]);///Enviar el token
    }
}
