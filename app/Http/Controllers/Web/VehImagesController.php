<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Imagevehicle;
use App\Models\Vehiclecomplement;
use Illuminate\Support\Facades\Input;

class VehImagesController extends Controller{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function create($id){//id del vehicles
    $vehicle=Vehicle::findOrFail($id);
    return view('panel.modules.vehicle.ActionVehicle.photos.index',['vehicle'=>$vehicle]);
  }
  public function store(Request $request){

      $file=$request->file('file');
      $idvehicle=$request->id;
      $filename=uniqid().$file->getClientOriginalName();

      $vehicle=Vehicle::find($idvehicle);
      $total=$vehicle->imagevehciles()->count();
      if ($total<6) {

          $dir='vehicle/'.$vehicle->placa;
          $file->move($dir,$filename);

          $photos=new Imagevehicle;
          $photos->img_name=$file->getClientOriginalName();
          $photos->path=$filename;
          $photos->vehicle_id=$idvehicle;
          $photos->vehicle()->associate($vehicle);
          $photos->save();

          return $photos;
  }
  return 'Error';


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
  public function destroy($id){
    $file=Imagevehicle::findOrFail($id);
    unlink(public_path('/vehicle/'.$file->vehicle->placa.'/'.$file->path));
    if ($file->delete()) {
       return response()->json(['rpt'=>'success']);
    }
  }

}

?>
