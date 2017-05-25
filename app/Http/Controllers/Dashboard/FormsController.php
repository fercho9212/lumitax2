<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    //Visualiza el formularios
    public function frm_create_driver(){
      return view('panel.modules.driver.forms.frm_create_user');
    }
    public function frm_create_passenger(){
      return view('panel.modules.passenger.forms.frm_create_passenger');
    }
}
