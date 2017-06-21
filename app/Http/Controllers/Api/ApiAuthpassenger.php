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
         return response()->json(['error'=>'Invalid_Crendals'],401);
      }

    } catch (JWTException $e) {
      return response()->json(['error' => 'could_not_create_token'], 500);
    }
    return response()->json(['Token User'=>compact('token'),'msg'=>'Accesso']);
  }

  public function register(Request $request){
     $validator = Validator::make($request->all(), [
         'pas_name' => 'required',
         'pas_last' => 'required',
         'pas_cc' => 'required',
         'email' => 'required|email',
         'password' => 'required',
         'pas_movil' => 'required',
         'pas_movil' => 'required',
     ]);
     if ($validator->fails()) {
         return response()->json(['error'=>$validator->errors()], 401);
     }
     $input = $request->all();
     $input['states_id']=1;
     $input['password']=bcrypt($input['password']);
     $passenger=Passenger::create($input);
     \Config::set('auth.providers.users.model', \App\Models\Passenger::class);
     \Config::set('jwt.user', \App\Models\Passenger::class);
     \Config::set('auth.model', \App\Models\Passenger::class);
     $token=JWTAuth::fromUser($passenger);
     return response()->json(['token'=>$token],200);
   }

   public function test(){
     echo 'Ahí vamos';
   }

}
