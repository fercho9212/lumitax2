<?php

namespace App\Http\Controllers\Api\GoogleCloudMsg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;

class PushController extends Controller{
  private $title;
  private $data;
  private $tip;

  function __construc(){
  }
  public function setTitle($title){
        $this->title = $title;
  }

  public function setData($data){
        $this->data = $data;
  }
  public function getPush(){
        return   $this->data;
    }

}
