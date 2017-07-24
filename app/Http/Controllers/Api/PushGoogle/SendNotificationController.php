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

    public function SendMsgPassenger($token,$request){
      $api_key='AIzaSyAHs5VIqpl4KSZyOJo5hN9KcnhmLhwclEg';
      $url = 'https://fcm.googleapis.com/fcm/send';
      $msg = array
            (
          'title'=> 'Portugal vs. Denmark',
          'body'=> $request,
          

            );
  	$fields = array
  			(
  				'to'		=> $token,
  				'data'	=> $msg
  			);


  	$headers = array
  			(
  				'Authorization: key=' . $api_key,
  				'Content-Type: application/json'
  			);
  #Send Reponse To FireBase Server
  		$ch = curl_init();
  		curl_setopt( $ch,CURLOPT_URL, $url );
  		curl_setopt( $ch,CURLOPT_POST, true );
  		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
  		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
  		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
  		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
  		$result = curl_exec($ch );
      curl_close( $ch );
      echo $result;
      //curl_close( $ch );

    /*  $url = 'https://fcm.googleapis.com/fcm/send';
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
    */
  }
}
