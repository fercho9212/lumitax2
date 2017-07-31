<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Vehiclecomplement;
use Illuminate\Support\Facades\Input;

class VehImagesController extends Controller{
  public function create($id){//id del vehicles
    $vehicle=Vehicle::findOrFail($id);
    return view('panel.modules.vehicle.ActionVehicle.photos.index',['vehicle'=>$vehicle]);
  }
  public function store(Request $request){
      $idvehicle=$request->id;
      $file=Input::file('file');
      $secureName=\Hash::make($file->getClientOriginalName());
      $dir=public_path().'/uploads/';
      $subir=$file->move($dir,$secureName.'.'.$file->guessExtension());
  }


}

?>
