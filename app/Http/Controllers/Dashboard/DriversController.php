<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Control\Driver;

class DriversController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $driver=                     new Driver;
    $driver->dri_name=           $request->dri_name;
    $driver->dri_last=           $request->dri_last;
    $driver->dri_cc=             $request->dri_cc;
    $driver->dri_mail=           $request->dri_mail;
    $driver->dri_address=        $request->dri_address;
    $driver->dri_movil=          $request->dri_movil;
    $driver->dri_phone=          $request->dri_phone;
    $driver->dri_photo=          false;
    $driver->dri_location=       false;
    $driver->messages_id=        1;
    $driver->dri_psw=            \Hash::make($request->dri_psw);
    $driver->dri_qual=           false;
    $driver->save();
    echo "Inserta :)";
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
      //
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
      //
  }


}
