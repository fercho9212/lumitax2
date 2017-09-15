<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Driver;

class ReportsController extends Controller
{
  public function index(){
    $drivers=Driver::all();
    return view('panel.modules.report.index',['drivers'=>$drivers]);
  }
  public function rportDriver(Request $request){

  }
}
