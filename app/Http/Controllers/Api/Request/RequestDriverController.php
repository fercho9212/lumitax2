<?php

namespace App\Http\Controllers\Api\Request;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestDriverController extends Controller
{
    public function RequestConfirmated(){
      $tknFbdUser=Input::get('tokenfiu');
      $body      =Input::get('body');
    }
}
