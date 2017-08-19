<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\Driver;
use App\Models\History;
use Alert;
use App\Http\Requests\Web\DriverRequest;
class HistoryController extends Controller
{
  public function __construct()
  {
    //  $this->middleware('auth');
  }

  public function viewHistory()
  {
    return view('panel.modules.history.index');
  }
  public function getDataHistory(){
    try {
      $history=new History();
      $array=$history->getAll();
      return response()->json(['data'=>$array]);

    } catch (\Exception $e) {
      return response()->json(['rpt'=>'error']);
    }
  }
}
