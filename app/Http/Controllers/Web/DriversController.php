<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\Driver;
use App\Models\Licence;
use App\Models\State;
use App\Models\Categorylicence AS Category;
use App\Models\Typeslicence AS Type;
use Flash;
use DB;
use App\Models\History;
use App\Http\Requests\Web\DriverRequest;
class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

       $driver=driver::orderBy('created_at', 'DESC')->get();
      $licence=licence::all();

       return view('panel.modules.driver.forms.view',['drivers'=>$driver,'licences'=>$licence]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=state::all();
        $categories=category::all();
        $types=type::all();
        return view('panel.modules.driver.forms.frm_create',
                    ["states"=>$states,'types'=>$types,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
      $file=$request->file('file');
      $filename=uniqid().$file->getClientOriginalName();

      $dir='photos/drivers/'.$request->dri_cc;
      $file->move($dir,$filename);


        DB::beginTransaction();
        try {


          $input = $request->all();
          $input['password']=bcrypt($input['password']);

          $input['dri_photo']=$filename;
          $input['apistate_id']=2;
          $driver=Driver::create($input);
          //$driver=Driver::find($driver);

          $licence=new Licence();
          $licence->id=$driver->id;
          $licence->lic_no=$request->lic_no;
          $licence->lic_validity=$request->lic_validity;
          $licence->category_id=$request->category_id;
          $licence->type_id=$request->type_id;
          $licence->save();
          $driver->licence()->save($licence);
          DB::commit();
        //  Alert::success('Éxito', 'Registro Insertado con éxito')->persistent('Cerrar');
        //  return redirect('/drivers')->with('success', 'Registro Insertado Con exito');
         return response()->json(['rpt'=>'success']);
        } catch (\Exception $e) {
                  DB::rollback();
                  echo 'ERROR (' . $e->getCode() . '): ' . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $driver=Driver::findOrFail($id);
          $states=State::all();
          $categories=category::all();
          $types=type::all();

          return view('panel.modules.driver.forms.edit',
                      ["driver"=>$driver,
                       "states"=>$states,
                       "types"=>$types,
                       "categories"=>$categories]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePhoto(Request $request){
      try {
        $driver=Driver::findOrFail($request->id);
        unlink(public_path('photos/drivers/'.$driver->dri_cc.'/'.$driver->dri_photo));
        $file=$request->file('file');

        $filename=uniqid().$file->getClientOriginalName();
        $driver=Driver::findOrFail($request->id);
        $driver->dri_photo = $filename;
        $driver->save();
        $dir='photos/drivers/'.$driver->dri_cc;
        $file->move($dir,$filename);
        $rpt='success';
      } catch (\Exception $e) {
        $rpt='Error';
      }
      return response()->json(['rpt'=>$rpt]);



    }

    public function update(DriverRequest $request, $id)
    {

      DB::beginTransaction();
      try {
            $driver=                  Driver::findOrFail($request->id);
            $licence=                 Licence::findOrFail($driver->id);
            $licence->lic_no=         $request->lic_no;
            $licence->lic_validity=$request->lic_validity;
            $licence->category_id=    $request->category_id;
            $licence->type_id=        $request->type_id;
            $driver->dri_name =       $request->dri_name;
            $driver->dri_last =       $request->dri_last;
            $driver->dri_cc =         $request->dri_cc;
            $driver->dri_address =    $request->dri_address;
            $driver->dri_movil =      $request->dri_movil;
            $driver->dri_phone =      $request->dri_phone ;
            $driver->state_id =       $request->state_id;
            $driver->email =          $request->email;
            if ($request->password=='' && $request->confiPass=='') {
                $driver->save();
                $licence->save();
                DB::commit();
                $rpt='success';
            }else {
                if ($request->password==$request->confiPass) {
                  $driver->password=bcrypt($request->password);
                  $driver->save();
                  $licence->save();
                  DB::commit();
                  $rpt='success';
                }
            }
            return response()->json(['rpt'=>$rpt]);
      } catch (\Exception $e) {
                DB::rollback();
                echo 'Error (' . $e->getCode() . '): ' . $e->getMessage();
      }


      }


    //function que muestra la interfaz mesajes push
    public function sendMsg(){

     return view('panel.modules.driver.msg.index');

    }
    //function que envia los mensajes push
    public function broadcastmsg(Request $request){
      try {
          $data=explode(",",$request->data);
          $msg=$request->msg;
          $in = '(' . implode(',', $data) .') ';
          $sql="";
          $sql.="select d.id,d.token_api FROM drivers d where d.id IN ".$in;
          $rpt=DB::SELECT($sql,array($request->data));
          foreach($rpt as $object)
            {
                if ($object->token_api==null) {
                   unset($object->token_api);
                }else {
                  $tokens[] = $object->token_api;
                }
            }
          if (empty($tokens)) {
            return response()->json(['rpt'=>'No contiene token']);
          }
          else {
            $rpt=$this->SendMsgMuticast($tokens,$msg);
            if ($rpt=='error') {
               return 'error';
            }else {
              return $rpt;
            }

          }
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'error']);
        }
      }
    public function SendMsgMuticast($tokens,$msg){
        try {
                   //FCM api URL
                $url = 'https://fcm.googleapis.com/fcm/send';
                //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
                $server_key = 'AIzaSyASYXnNkxlyNxlApKAgs4MSreagyxTgs3c';
                $fields = array();
                $body=array('body' => $msg);
                $fields['data'] = $body;
                if(is_array($tokens)){
                  $fields['registration_ids'] = $tokens;
                }else{
                  $fields['to'] = $tokens;
                }
                //header with content_type api key
                $headers = array(
                  'Content-Type:application/json',
                  'Authorization:key='.$server_key
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                if ($result === FALSE) {
                  die('FCM Send Error: ' . curl_error($ch));
                }
                curl_close($ch);
                return $result;

        } catch (\Exception $e) {
           $error="error";
           return $error;
        }

    }


    public function getDriver(){
      $driver=new Driver;
      $array=$driver->getDriverMsg();
      return response()->json(['data'=>$array]);
    }
  /*  public function getToMsg(Request $request){
      $tokens=explode(',',$request->token_api);
      print_r($tokens);
    }*/
    /**
     * Función que muestra los vehículos por conductor
     */
     public function getVehicles(Request $request){
       $dri=new Driver();
       $driver=Driver::findOrFail($request->id);
       $query=$dri->getVehicles($driver->id);
       return response()->json(['rpt'=>$query]);

     }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $driver=Driver::findOrFail($id);
        if ($driver->dri_photo!=NULL) {
          unlink(public_path('photos/drivers/'.$driver->dri_cc.'/'.$driver->dri_photo));
        }
        if ($driver->delete()) {
           return response()->json();
        }
    }

}
