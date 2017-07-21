<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Insurance;

class DocumentsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function create($id){
      $vehicle=Vehicle::findOrFail($id);
      $insurance=Insurance::all();
      return view('panel.modules.vehicle.ActionVehicle.document.create',['id'=>$id,
                                                                         'vehicle'=>$vehicle,
                                                                         'insurance'=>$insurance,
                                                                       ]);
    }
}
