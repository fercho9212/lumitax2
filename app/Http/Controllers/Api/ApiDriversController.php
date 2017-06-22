<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
class ApiDriversController extends Controller
{
    public function profile(){
      $driver = JWTAuth::parseToken()->authenticate();
      return response()->json(compact('driver'));
    }
}
