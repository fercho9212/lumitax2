<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
    public function create($id){
      return view('panel.modules.document.index',['id'=>$id]);
    }
}
