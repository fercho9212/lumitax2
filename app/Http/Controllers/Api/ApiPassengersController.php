<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use App\Models\Passenger;

class ApiPassengersController extends Controller
{
  public function profile(){
    $passenger = JWTAuth::parseToken()->authenticate();
    return response()->json($passenger);
  }
  public function InsertTokendPassengers(){
    $passengers = JWTAuth::parseToken()->authenticate();
    $token=Input::get('token');
    $passenger=Passenger::find($passengers->id);
    $passenger->token_api=$token;
    if ($passenger->save()) {
       return response()->json(['rpt'=>'success']);
    }else {
      return response()->json(['rpt'=>'error']);
    }

  }
}
