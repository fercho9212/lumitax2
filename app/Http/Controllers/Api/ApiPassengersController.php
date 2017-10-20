<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Input;
use App\Models\Passenger;
use App\Models\Driver;
use DB;
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

  public function Qualification(){
    $driver=new Driver;
    $iddriver=Input::get('iddriver');
    $value=Input::get('quali');
    $qualification=$driver->qual($iddriver,$value);
    return response()->json(['rpt'=>$qualification]);
    }
    //Guarda las solicitudos del pasajero

  public function Request(){
    $id_user    =Input::get('id_user');
    $id_request =Input::get('id_request');
    $passenger  =Passenger::find($id_user);
    $passenger->stateServices()->attach($id_request);
    return response()->json(['rpt'=>'success']);
  }

  /**
   * Función que verifica si existe el correo para recuperación de password
   */
  public function verifyemail(Request $request){
    $passenger=new Passenger();
    $r=$passenger->verify($request->email);
    if ($r==1) {
      $rpt="success";
    }else {
      $rpt="error";
    }
    return response()->json(['rpt'=>$rpt]);
  }
  public function updateemail(Request $request){
    $validator = \Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
    ]);
    if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors(),'rpt'=>'error']);
    }
    try {
      $email=Input::get('email');
      $password=bcrypt(Input::get('password'));
      DB::table('passengers')->where('email', $email)->update(['password' =>$password]);
      return  response()->json(['rpt'=>'success']);
    } catch (\Exception $e) {
      return  response()->json(['rpt'=>'error']);
    }
  }


}
