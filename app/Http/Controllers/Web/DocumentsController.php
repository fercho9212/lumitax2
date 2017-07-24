<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Document;
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
      $documents=Document::all();
      return view('panel.modules.vehicle.ActionVehicle.document.create',['id'=>$id,
                                                                         'vehicle'=>$vehicle,
                                                                         'insurance'=>$insurance,
                                                                         'documents'=>$documents,
                                                                       ]);
    }
  public function store(Request $request){
      $document=Document::create($request->all());
      echo "Okkk";
    }
  public function destroy($id){
    $vehicle=Document::find($id);
    if ($vehicle->delete()) {
       return response()->json();
    }
  }
}
