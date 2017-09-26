<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\Driver;
use App\Models\Licence;
use App\Models\Passenger;
use App\Models\Advertising;
use App\Models\Imagedriver;
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
      ]);
      if ($validator->fails()) {
          return response()->json(['error'=>$validator->errors(),'rpt'=>'error'], 200);
      }
      DB::beginTransaction();
      try {

            $driver=new Driver();
            $driver->dri_photo='dddd';
            $driver->dri_name=            $request->dri_name;
            $driver->dri_last=            $request->dri_last;
            $driver->dri_cc=              $request->dri_cc;
            $driver->dri_address=         $request->dri_address;
            $driver->dri_movil=           $request->dri_movil;
            $driver->dri_phone=           $request->dri_phone;
            $driver->email=               $request->email;
            $driver->password=            bcrypt($request->password);
            $driver->state_id=            2;
            $driver->register_id=         2;

            if($driver->save()){

                $licence=new Licence();
                $licence->id=                 $driver->id;
                $licence->lic_no=             $request->dri_cc;
                $licence->lic_validity=       $request->lic_validity;
                $licence->category_id=        $request->category_id;
                $licence->type_id=            $request->type_id;
                $licence->save();
                DB::commit();
              return response()->json(['rpt'=>'success','iddriver'=>$driver->id]);
            }else {
              return response()->json(['rpt'=>'error']);
            }
      } catch (Exception $e) {
        DB::rollback();
        return response()->json(['rpt'=>'error']);
      }

    }

    /**
     * [updatePhoto Función que atualiza la foto de perfil]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updatePhoto(Request $request){
      try {
        $file=$request->file('file');
        $filename=uniqid().$file->getClientOriginalName();
        $driver=Driver::findOrFail($request->id_driver);
        $driver->dri_photo = $filename;
        $driver->save();
        $dir='photos/drivers/'.$driver->dri_cc;
        $file->move($dir,$filename);
        $rpt='success';
      } catch (\Exception $e) {
        $rpt='error';
      }
      return response()->json(['rpt'=>$rpt]);
    }
    public function upDocuments(Request $request){
      try {
            $array=[
              $request->file('file1'),
              $request->file('file2'),
              $request->file('file3')
            ];
            $driver=Driver::findOrFail($request->id_driver);
            foreach ($array as $files) {
                $photos=new Imagedriver;
                $photos->img_name=$files->getClientOriginalName();
                $photos->path=uniqid().$files->getClientOriginalName();
                $photos->driver_id=$driver->id;
                $photos->driver()->associate($driver);
                $photos->save();
                $dir='photos/drivers/'.$driver->dri_cc.'/documents';
                $files->move($dir,$photos->path);
        }
        return response()->json(['rpt'=>'success']);
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'error']);
      }



    }
}
