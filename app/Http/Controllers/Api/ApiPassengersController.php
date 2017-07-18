<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
class ApiPassengersController extends Controller
{
  public function profile(){
    $passenger = JWTAuth::parseToken()->authenticate();
    return response()->json($passenger);
  }
}
