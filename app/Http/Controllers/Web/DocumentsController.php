<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Document;
use App\Models\Insurance;
use App\Http\Requests\Web\DocumentRequest;

class DocumentsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function create($id){
      $vehicle=Vehicle::findOrFail($id);
      $insurance=Insurance::all();
      $documents=Document::where('vehicle_id', $id)->get();
      return view('panel.modules.vehicle.ActionVehicle.document.create',['id'=>$id,
                                                                         'vehicle'=>$vehicle,
                                                                         'insurance'=>$insurance,
                                                                         'documents'=>$documents,
                                                                       ]);
    }
  public function store(DocumentRequest $request){
      try {
        $document=Document::create($request->all());
        return response()->json(['msg'=>'success']);
      } catch (\Illuminate\Database\QueryException $e) {
        return $e->errorInfo[1]; //Envia el error de duplicidad
      }


    }
  public function destroy($id){
    $vehicle=Document::find($id);
    if ($vehicle->delete()) {
       return response()->json();
    }
  }
}
