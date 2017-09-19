<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Imagedriver;
use Illuminate\Support\Facades\Input;

class DriImagesController extends Controller{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function create($id){//id del vehicles
    $driver=Driver::findOrFail($id);
    return view('panel.modules.driver.forms.edit',['driver'=>$driver]);
  }

  public function store(Request $request){

      $file=$request->file('file');
      $iddriver=$request->id;
      $filename=uniqid().$file->getClientOriginalName();
      $driver=Driver::find($iddriver);
      $total=$driver->imagedrivers()->count();
      if ($total<6) {
          $dir='driImgDoc/documents/'.$driver->dri_cc;
          $file->move($dir,$filename);

          $photos=new Imagedriver;
          $photos->img_name=$file->getClientOriginalName();
          $photos->path=$filename;
          $photos->driver_id=$iddriver;
          //$photos->v()->associate($driver);
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

  }
  public function destroy($id){
    $file=Imagevehicle::findOrFail($id);
    unlink(public_path('/vehicle/'.$file->vehicle->placa.'/'.$file->path));
    if ($file->delete()) {
       return response()->json(['rpt'=>'success']);
    }
  }
*/
}
}
?>
