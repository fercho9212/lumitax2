<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\History;
use App\Models\Driver;
use DB;
class ApiHistoryController extends Controller
{
    public function saveHistory(Request $request){

          try {
            $history=new History();
            $history->driver_id=           $request->driver_id;
            $history->passenger_id=        $request->passenger_id;
            $history->date_start=          $request->date_start;
            $history->address_start=       $request->address_start;
            $history->stateservice_id=     $request->stateservice_id;
            $history->payment_id=          $request->payment_id;
            $history->price=               $request->price;
            $history->date_end=            $request->date_end;
            $history->address_end=         $request->address_end;
            $history->save();
            return response()->json(['rpt'=>'success']);
          } catch (\Exception $e) {
            return response()->json(['rpt'=>'error']);
          }

      }




    public function viewHistoryDriver(Request $request){
        try {
          $history=new History();
          $array=$history->getHistoryDriver($request->driver);
          return response()->json(['rpt'=>$array]);
        } catch (\Exception $e) {
          return response()->json(['rpt'=>'error']);
        }
    }
}
