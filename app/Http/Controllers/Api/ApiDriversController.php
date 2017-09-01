<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\Advertising;
use Illuminate\Support\Facades\Input;
use Validator;
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
      $passenger=new Passenger;
      $id_passenger=Input::get('idpass');
      $value=Input::get('quali');
      $qualification=$passenger->qual($id_passenger,$value);
      return response()->json(['rpt'=>$qualification]);
    }
    //Publicidad
    public function Advertising(){
      $advertising=Advertising::all();
      return response()->json(['rpt'=>$advertising]);
    }
    public function Register(Request $request){
      $validator = Validator::make($request->all(), [
          'dri_name' => 'required',
          'dri_last' => 'required',
          'email' => 'required|email|unique:drivers',
          'password' => 'required',
          'dri_movil' => 'required',
          'dri_photo' => 'required',
      ]);
      if ($validator->fails()) {
          return response()->json(['error'=>$validator->errors(),'rpt'=>'error'], 200);
      }
      try {
        $driver=new Driver();
        $driver->dri_name=            $request->name;
        $driver->dri_last=            $request->last;
        $driver->dri_cc=              $request->cc;
        $driver->dri_address=         $request->address;
        $driver->dri_movil=           $request->movil;
        $driver->dri_phone=           $request->phone;
        $driver->dri_photo=           $request->photo;
        $driver->email=               $request->email;
        $driver->password=            $request->password;
        $driver->state_id=            2;
        $driver->register_id=         2;
        $driver->save();
      } catch (\Exception $e) {
        return response()->json(['error'=>'try','rpt'=>'error'], 200);
      }
    }


    public function Register(Request $request){
      $validator = Validator::make($request->all(), [
          'dri_name' => 'required',
          'dri_last' => 'required',
          'email' => 'required|email|unique:drivers',
          'password' => 'required',
          'dri_movil' => 'required',
          'dri_photo' => 'required',
      ]);
      if ($validator->fails()) {
          return response()->json(['error'=>$validator->errors(),'rpt'=>'error'], 200);
      }
      try {
        $driver=new Driver();
        $driver->dri_name=            $request->dri_name;
        $driver->dri_last=            $request->dri_last;
        $driver->dri_cc=              $request->dri_cc;
        $driver->dri_address=         $request->dri_address;
        $driver->dri_movil=           $request->dri_movil;
        $driver->dri_phone=           $request->dri_phone;
        $driver->dri_photo=           $request->dri_photo;
        $driver->email=               $request->email;
        $driver->password=            $request->password;
        $driver->state_id=            2;
        $driver->register_id=         2;
        $driver->save();
      } catch (\Exception $e) {
        return response()->json(['error'=>'try','rpt'=>'error'], 200);
      }
    }

  }
