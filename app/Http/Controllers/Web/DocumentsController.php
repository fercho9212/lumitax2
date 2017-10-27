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
       return response()->json(['rpt'=>'success']);
    }else {
      return response()->json(['rpt'=>'Error']);
    }
  }
  public function update(DocumentRequest $request,$id){
    try {

      $document=Document::findOrFail($id);
      $document->doc_company  =    $request->doc_company;
      $document->doc_policy   =    $request->doc_policy;
      $document->description=  $request->description;
      $document->doc_datei    =    $request->doc_datei;
      $document->doc_datef    =    $request->doc_datef;
      if ($document->save()) {
         $rpt="success";
      }else {
        $rpt="error";
      }
      return response()->json(['rpt'=>$rpt]);
    } catch (\Exception $e) {
      return response()->json(['rpt'=>'error try']);
    }
  }
//Documetos próximos a vencer
 public function docuExpired(){
    $document=new Document;
    $rpt=$document->docuExpired();
    return view('panel.modules.document.expiratedNext',['document'=>$rpt]);
 }
 //Documetos Vencidos
  public function expirated(){
     $document=new Document;
     $rpt=$document->expirated();
     return view('panel.modules.document.expirated',['document'=>$rpt]);
  }

}
