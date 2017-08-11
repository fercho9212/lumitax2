<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiHistoryController extends Controller
{
    public function saveHistory(Request $Request){
      print_r($request->all());
    }
}
