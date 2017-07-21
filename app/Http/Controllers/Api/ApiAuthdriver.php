<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Validator;

class ApiAuthdriver extends Controller
{
  public function __construct(){
    \Config::set('auth.providers.users.model', \App\Models\Driver::class);
    \Config::set('jwt.user', \App\Models\Driver::class);
    \Config::set('auth.model', \App\Models\Driver::class);
  }
  public function authenticate(Request $request){
    $credentials=$request->only('dri_cc','password');
    if ($credentials) {
      try {
        \Config::set('auth.providers.users.model', \App\Models\Driver::class);
        \Config::set('jwt.user', \App\Models\Driver::class);
        \Config::set('auth.model', \App\Models\Driver::class);
        if (!$token =JWTAuth::attempt($credentials)) {
           return response()->json(['error'=>'Invalid_Crendals','rpt'=>'error'],200);
        }

      } catch (JWTException $e) {
        return response()->json(['error' => 'could_not_create_token'], 200);
      }
      return response()->json(['token'=>compact('token'),'rpt'=>'success']);
    }else {
      return response()->json(['rpt'=>'Errordasdd']);
    }

  }
  public function test(){
    return response()->json(compact('driver'));
  }
}
