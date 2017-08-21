<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Driver;
use App\Models\Document;
use DB;

class ApiDocumentsController extends Controller
{
    //Función que describe si ahí documentos vencidos
    public function documents(Request $request){
      $doc=new Document;
      $cant=$doc->countDocuVen($request->idvehicle);
      if ($cant>0) {
        $r='expirate';
      }else {
        $r='good';
      }
      return response()->json(['rpt'=>$r]);
    }

    //Función que describe si ahí documentos vencidos
    public function licences(Request $request){
      $driver=new Driver;
      $cant=$driver->licenceexpirated($request->iddriver);
      if (empty($cant[0])) {
        $rpt='success';
      }else {
         $rpt=$cant[0]->vigencia;
      }
      return response()->json(['rpt'=>$rpt]);
    }

}
