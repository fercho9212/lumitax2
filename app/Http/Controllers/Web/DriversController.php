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
          $input['apistate_id']=1;
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


    //function que envia mesajes push
    public function sendMsg(){
      $drivers=driver::all();
      return view('panel.modules.driver.msg.index',['drivers'=>$drivers]);

    }
    public function getToMsg(Request $request){
      $tokens=explode(',',$request->token_api);
      print_r($tokens);
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
