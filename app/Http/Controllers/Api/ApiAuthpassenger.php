<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Passenger;
use JWTAuth;
use Validator;
class ApiAuthpassenger extends Controller
{
  public function __construct(){
    \Config::set('auth.providers.users.model', \App\Models\Passenger::class);
    \Config::set('jwt.user', \App\Models\Passenger::class);
    \Config::set('auth.model', \App\Models\Passenger::class);
  }
  public function authenticate(Request $request){
    $credentials=$request->only('email','password');
    try {

      if (!$token =JWTAuth::attempt($credentials)) {
         return response()->json(['error'=>'Invalid_Crendals','rpt'=>'error'],200);
      }
    } catch (JWTException $e) {
      return response()->json(['error' => 'could_not_create_token','rpt'=>'error'], 200);
    }
    return response()->json(['token'=>compact('token'),'rpt'=>'success']);
  }

  public function register(Request $request){
     $validator = Validator::make($request->all(), [
         'pas_name' => 'required',
         'pas_last' => 'required',

         'email' => 'required|email|unique:passengers',
         'password' => 'required',
         'pas_movil' => 'required',
     ]);
     if ($validator->fails()) {
         return response()->json(['error'=>$validator->errors(),'rpt'=>'error'], 200);
     }
     $input = $request->all();
     $input['state_id']='1';
     $input['password']=bcrypt($input['password']);
     $passenger=Passenger::create($input);
     \Config::set('auth.providers.users.model', \App\Models\Passenger::class);
     \Config::set('jwt.user', \App\Models\Passenger::class);
     \Config::set('auth.model', \App\Models\Passenger::class);
     $token=JWTAuth::fromUser($passenger);
     return response()->json(['rpt'=>'success','succes'=>$token],200);
   }

   public function test(){
     echo 'Ahí vamos';
   }

}
