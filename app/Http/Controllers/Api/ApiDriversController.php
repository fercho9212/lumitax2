<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\Driver;
use Illuminate\Support\Facades\Input;
use DB;

class ApiDriversController extends Controller
{
    public function __construct(){
    //  $driver = JWTAuth::parseToken()->authenticate();
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
   /**
    * Función que recibe el id del conductor y extrae el token de firebase
    * @id id del Conductores
    */
    public function getTokenDriver($id){
      $tokenApi=Driver::findOrFail($id);
      return  $tokenApi->token_api;
    }

    /**
     * Inserta el token a la db de drivers
     * @token: token recibido of driver
     */
    public function InsertTokendDrivers(){
      $driver = JWTAuth::parseToken()->authenticate();
      $token=Input::get('token');
      $driver=Driver::find($driver->id);
      $driver->token_api=$token;
      if ($driver->save()) {
         return response()->json(['rpt'=>'success']);
      }else {
        return response()->json(['rpt'=>'error']);
      }
      }

    public function Qualification(){
      try {
        $iddriver=Input::get('id_driver');
        $value=Input::get('qualification');
        $cant=DB::SELECT('select  COUNT(*) as sum FROM driver_passenger d WHERE d.driver_id=?',array($iddriver));
        $cantidad=$cant[0]->sum;
        $acum=DB::SELECT('select dri_qual as qualification from drivers WHERE id=?',array($iddriver));
        $acumulado=$acum[0]->qualification;
        $qualification=(($acumulado*$cantidad)+$value)/($cantidad+1);
        DB::SELECT('update drivers set dri_qual=?  WHERE id=?',array($qualification,$iddriver));
        echo 'Exito';
      } catch (\Exception $e) {
         echo 'Error';
      }


    }


}
