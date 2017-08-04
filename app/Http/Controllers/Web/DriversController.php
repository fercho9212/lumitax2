<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\Driver;
use App\Models\Licence;
use App\Models\state;
use App\Models\Categorylicence AS Category;
use App\Models\Typeslicence AS Type;
use Flash;
use DB;
use Alert;
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
        $driver=driver::all();
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
    public function store(Request $request)
    {
      $file=$request->file('file');
      $filename=uniqid().$file->getClientOriginalName();
    $validator = Validator::make($request->all(), [
          'lic_no'=>'required',
          'category_id'=>'required',
          'type_id'=>'required',
          'dri_name' => 'required',
          'dri_last' => 'required',
          'dri_cc' => 'required',
          'dri_address' => 'required',
          'dri_movil' => 'required',
          'dri_phone' => 'required',
          'state_id' => 'required',
          'email' => 'required|email',
          'password' => 'required',

      ]);
      if ($validator->fails()) {
          return redirect('/drivers/create')->withErrors($validator)->withInput();

      }else {
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
    public function update(Request $request, $id)
    {
      if ($request->ajax()) {
        $validator = Validator::make($request->all(), [
            'lic_no'=>'required',
            'category_id'=>'required',
            'type_id'=>'required',
            'dri_name' => 'required',
            'dri_last' => 'required',
            'dri_cc' => 'required',
            'dri_address' => 'required',
            'dri_movil' => 'required',
            'dri_phone' => 'required',
            'state_id' => 'required',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }
        DB::beginTransaction();
        try {
              $driver=                  Driver::findOrFail($id);
              $licence=                 Licence::findOrFail($driver->id);
              $licence->lic_no=         $request->lic_no;
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
              if ($request->password=='') {
                  $driver->save();
                  $licence->save();
                  DB::commit();
              }else {
                $validator = Validator::make($request->all(), [
                    'password' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
                  $driver->password=$request->password;
                  $driver->save();
                  $licence->save();
                  DB::commit();
              }
        } catch (\Exception $e) {
                  DB::rollback();
                  echo 'ERhhRsOR (' . $e->getCode() . '): ' . $e->getMessage();
        }
      }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver= Driver::find($id);
        if ($driver->delete()) {
           return response()->json();
        }
    }
}
