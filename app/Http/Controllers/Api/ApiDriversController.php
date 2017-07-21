<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\Driver;
use Illuminate\Support\Facades\Input;

class ApiDriversController extends Controller
{
    public function __construct(){
      $driver = JWTAuth::parseToken()->authenticate();
    }

    public function profile(){
      $driver = JWTAuth::parseToken()->authenticate();
      $driver=Driver::findOrFail($driver->id);
      return response()->json(compact('driver'));
    }

    public function UpdateLocation(Request $request)
   {
       $driver = JWTAuth::parseToken()->authenticate();
       $dri=Driver::findOrFail($driver->id);
       $dri->dri_location=$request->location;
       $dri->save();
       return response()->json(['rpt'=>'success']);
   }
   //Funcion que optiene el estado del conductor
   public function getState(){
      $driver = JWTAuth::parseToken()->authenticate();
      $id=$driver->id;
      $driver=Driver::findOrFail($id);
      return response()->json(['rpt'=>$driver->apistate->api_state,'id'=>$driver->apistate->id]) ;
   }
   //Function que optiene la acción y actualiza el estado
   public function setState(){
      $driver = JWTAuth::parseToken()->authenticate();
      $id=$driver->id;
      $driver=Driver::findOrFail($id);
      $driver->apistate_id=Input::get('idState');
      $driver->save();
      return response()->json(['rpt'=>'success']);
   }

}
