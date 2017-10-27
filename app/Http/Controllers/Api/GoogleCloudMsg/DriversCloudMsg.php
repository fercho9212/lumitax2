<?php

namespace App\Http\Controllers\Api\GoogleCloudMsg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;

class DriversCloudMsg extends Controller{


  private $ApiKeyDriver='AIzaSyDH6vw5eVwTE6H-uPwfoe2ieX2jnPovjOE';
  private $url    ='https://fcm.googleapis.com/fcm/send';
  /*
  *@to token firebase driver
  */
  public function send($to,$message,$idSerach=!NULL){

    $body=array('body' => $message);

    $fields=array(
            'to'=>$to,
            'data'=>$body,
    );
    $headers=array(
              'Authorization: key='.$this->ApiKeyDriver,
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
    if ($result==false) {
      echo "DASDASD";
    }else {
      $rpt=array();
      $rpt['rpt']='success';
      $rpt['token']=$to;
      $rpt['result']=$result;
      $rpt['id']=$idSerach;
    return $rpt;
    }
  }

}

?>
