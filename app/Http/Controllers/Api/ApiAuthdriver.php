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
    $credentials=$request->only('email','password');
    try {
      \Config::set('auth.providers.users.model', \App\Models\Driver::class);
      \Config::set('jwt.user', \App\Models\Driver::class);
      \Config::set('auth.model', \App\Models\Driver::class);
      if (!$token =JWTAuth::attempt($credentials)) {
         return response()->json(['error'=>'Invalid_Crendals'],401);
      }

    } catch (JWTException $e) {
      return response()->json(['error' => 'could_not_create_token'], 500);
    }
    return response()->json(['Token User'=>compact('token'),'msg'=>'Accesso']);
  }
  public function test(){
    return response()->json(compact('driver'));
  }
}
