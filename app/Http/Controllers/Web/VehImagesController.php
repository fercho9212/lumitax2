<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Imagevehicle;
use App\Models\Vehiclecomplement;
use Illuminate\Support\Facades\Input;

class VehImagesController extends Controller{
  public function create($id){//id del vehicles
    $vehicle=Vehicle::findOrFail($id);
    return view('panel.modules.vehicle.ActionVehicle.photos.index',['vehicle'=>$vehicle]);
  }
  public function store(Request $request){

      $file=$request->file('file');
      $idvehicle=$request->id;
      $filename=uniqid().$file->getClientOriginalName();


      $dir='vehicle/';
      $file->move($dir,$filename);
      $vehicle=Vehicle::find($idvehicle);
      $photos=new Imagevehicle;
      $photos->img_name=$file->getClientOriginalName();
      $photos->path=$filename;
      $photos->vehicle_id=$idvehicle;
      $photos->vehicle()->associate($vehicle);
      $photos->save();

      return $photos;



      /*
      $idvehicle=$request->id;



      $file=Input::file('file');
      $secureName=\Hash::make($file->getClientOriginalName());
      $dir=public_path().'/vehicle/';
      $subir=$file->move($dir,$secureName.'.'.$file->guessExtension());
      $vehicle=Vehicle::find($idvehicle);
      $photos=new Imagevehicle;
      $photos->img_name=$file->getClientOriginalName();
      $photos->path="path";
      $photos->vehicle_id=$idvehicle;
      $photos->vehicle()->associate($vehicle);
      $photos->save();
      echo "string";
*/
  }


}

?>
