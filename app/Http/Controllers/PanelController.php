<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\History;
use App\Models\Vehicle;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class PanelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $countDri=Driver::count();
        $countPass=Passenger::count();
        $countServe=History::count();
        $countVeh=Vehicle::count();
        return view('panel.dashboard',['countDri'=>$countDri,
                                      'countPass'=>$countPass,
                                      'countServe'=>$countServe,
                                      'countVeh'=>$countVeh
      ]);
    }
    public function graph(){
      $countServe=History::count();
      return response()->json($countServe);
    }
}
