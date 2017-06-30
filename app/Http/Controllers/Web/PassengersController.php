<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\State;
use Validator;
use Alert;
class PassengersController extends Controller
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
        $passenger=Passenger::all();
        $state=State::all();
        return view('panel.modules.passenger.index',['passengers'=>$passenger],['states'=>$state]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Create controller :";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'pas_name'=>'required',
          'pas_last'=>'required',
          'email'=>'required|email|unique:passengers',
          'password' => 'required',
          'state_id' => 'required',
      ]);


      if ($validator->fails()) {
          return redirect('/passengers')->withErrors($validator)->withInput();
      }else {
            try {
              $input = $request->all();
              $passenger=Passenger::create($input);
              Alert::success('Éxito', 'Registro Insertado con éxito')->persistent('Cerrar');
              return redirect('/passengers')->with('success', 'Registro Insertado Con exito');
              } catch (Exception $e) {
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
      $passenger=Passenger::findOrFail($id);
      return response()->json($passenger);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $passenger= Passenger::find($id);
      if ($passenger->delete()) {
         return response()->json();
      }
    }
}
