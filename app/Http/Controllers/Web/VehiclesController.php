<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Vehiclecomplement;
use App\Models\Classvehicle AS Clase;
use App\Models\Typevehicle AS Type;
use App\Models\Brandvehicle AS Brand;
use App\Models\Typebodywork AS Bodywork;
use App\Models\Baul AS Baul;
use App\Models\Spacevehicle AS Space;
use App\Http\Requests\Web\VehicleRequest;
use App\Http\Requests\Web\VehicleComplementRequest;


use DB;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        //$vehicle=Vehicle::all();
        $vehicle=Vehicle::where('leveles_id','=','1')->get();
        return view('panel.modules.vehicle.taxindex',['vehicles'=>$vehicle]);
    }
    public function indexLuxury()
    {
        $vehicle=Vehicle::where('leveles_id','=','2')->get();
        return view('panel.modules.vehicle.luxuryindex',['vehicles'=>$vehicle]);
    }
    public function indexPremium(){
      $vehicle=Vehicle::where('leveles_id','=','3')->get();
      return view('panel.modules.vehicle.premiumindex',['vehicles'=>$vehicle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type   =  Type::all();
        $brand  =  Brand::all();
        $class  =  Clase::all();
        $bodywork= Bodywork::all();
        $space=    Space::all();
        $baul=     Baul::all();
        return view('panel.modules.vehicle.forms.create',['types'=>$type,
                                                          'brands'=>$brand,
                                                          'class'=>$class,
                                                          'bodyworks'=>$bodywork,
                                                          'spaces'=>$space,
                                                          'baules'=>$baul,
                                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (VehicleRequest $request)
    {
      //dd($request->all());
      //echo $request->all();
      try {
        $vehicle= New Vehicle();
        $vehicle->placa           =$request->placa;
        $vehicle->veh_model       =$request->veh_model;
        $vehicle->veh_motor       =$request->veh_motor;
        //$vehicle->serie     =$request->veh_serie;
        $vehicle->veh_serie       =$request->veh_serie;
        $vehicle->veh_vin         =$request->veh_vin;
        $vehicle->veh_color       =$request->veh_color;
        $vehicle->brand_id        =$request->brand_id;
        $vehicle->class_id        =$request->class_id;
        $vehicle->typevehicle_id  =$request->typevehicle_id;
        $vehicle->baul_id         =$request->baul_id;
        $vehicle->space_id        =$request->spacevehicle_id;

        $vehicle->leveles_id= $request->leveles_id;
        $vehicle->save();
        $rpt='taxi';
        return response()->json(['rpt'=>$rpt]);
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'exception']);
      }
      return response()->json(['rpt'=>'error']);



    }
    public function StoreLuxury(VehicleComplementRequest $request){
      try {
        $vehicle= New Vehicle();
        $vehicle->placa           =$request->placa;
        $vehicle->veh_model       =$request->veh_model;
        $vehicle->veh_motor       =$request->veh_motor;
        //$vehicle->serie     =$request->veh_serie;
        $vehicle->veh_serie       =$request->veh_serie;
        $vehicle->veh_vin         =$request->veh_vin;
        $vehicle->veh_color       =$request->veh_color;
        $vehicle->brand_id        =$request->brand_id;
        $vehicle->class_id        =$request->class_id;
        $vehicle->typevehicle_id  =$request->typevehicle_id;
        $vehicle->leveles_id      =$request->leveles_id;
        $vehicle->baul_id         =$request->baul_id;
        $vehicle->space_id        =$request->spacevehicle_id;

        $vehicle->save();
        $complemt=New Vehiclecomplement();
        $complemt->id=$vehicle->id;
        $complemt->vc_brakes=$request->vc_brakes;
        $complemt->vc_Airbags=$request->vc_airbags;
        $complemt->vc_head=$request->vc_head;
        $complemt->vc_doors=$request->vc_doors;
        $complemt->vc_cabin=$request->vc_cabin;
        $space=$request->vc_ancho.' * '.$request->vc_alto;
        $complemt->vc_space=$space;
        $complemt->vc_passagers=$request->vc_passagers;
        $complemt->vc_sillateria=$request->vc_sillateria;
        $complemt->vc_cellar=$request->vc_cellar;
        $complemt->typebodywork_id=$request->typebodywork_id;
        $complemt->vc_cylinder=$request->vc_cylinder;
        $complemt->vc_power=$request->vc_power;
        $vehicle->vehiclecomplement()->save($complemt);

        if ($vehicle->leveles_id=='2') {
          $rpt='luxury';
        }elseif ($vehicle->leveles_id=='3') {
          $rpt='premium';
        }else {
          $rpt='error';
        }

        return response()->json(['rpt'=>$rpt]);
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'exception']);
      }
        return response()->json(['rpt'=>'error']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle=Vehicle::findOrFail($id);
        return view('panel.modules.vehicle.ActionVehicle.index',['vehicle'=>$vehicle]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle=Vehicle::findOrFail($id);
        $type   =  Type::all();
        $brand  =  Brand::all();
        $class  =  Clase::all();
        $bodywork= Bodywork::all();

        return view('panel.modules.vehicle.ActionVehicle.forms.edit',['vehicle'=>$vehicle,
                                                                      'types'=>$type,
                                                                      'brands'=>$brand,
                                                                      'class'=>$class,
                                                                      'bodyworks'=>$bodywork]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle=Vehicle::findOrFail($id);
        try {
          $vehicle->placa=$request->placa;
          $vehicle->veh_model=$request->veh_model;
          $vehicle->veh_motor=$request->veh_motor;
          $vehicle->veh_serie=$request->veh_serie;
          $vehicle->veh_vin=$request->veh_vin;
          $vehicle->veh_color       =$request->veh_color;
          $vehicle->class_id        =$request->class_id;
          $vehicle->brand_id        =$request->brand_id;
          $vehicle->typevehicle_id  =$request->typevehicle_id;
          $vehicle->leveles_id      =$request->leveles_id;
          $vehicle->save();
          return response()->json(['rpt'=>'success']);
        } catch (\Exception $e) {
          return response()->json(['error'=>'error',400]);
        }

    }
    public function updateLuxury(VehicleComplementRequest $request, $id)
    {
      try {
        $vehicle=Vehicle::findOrFail($id);
        $complemt=Vehiclecomplement::findOrFail($vehicle->id);
        $vehicle->placa           =$request->placa;
        $vehicle->veh_model       =$request->veh_model;
        $vehicle->veh_motor       =$request->veh_motor;
        //$vehicle->serie     =$request->veh_serie;
        $vehicle->veh_serie       =$request->veh_serie;
        $vehicle->veh_vin         =$request->veh_vin;
        $vehicle->veh_color       =$request->veh_color;
        $vehicle->brand_id        =$request->brand_id;
        $vehicle->class_id        =$request->class_id;
        $vehicle->typevehicle_id  =$request->typevehicle_id;
        $vehicle->leveles_id      =$request->leveles_id;
        $vehicle->save();
        $complemt->id=$vehicle->id;
        $complemt->vc_brakes=$request->vc_brakes;
        $complemt->vc_Airbags=$request->vc_airbags;
        $complemt->vc_head=$request->vc_head;
        $complemt->vc_doors=$request->vc_doors;
        $complemt->vc_cabin=$request->vc_cabin;
        $space=$request->vc_ancho.' * '.$request->vc_alto;
        $complemt->vc_space=$space;
        $complemt->vc_passagers=$request->vc_passagers;
        $complemt->vc_sillateria=$request->vc_sillateria;
        $complemt->vc_cellar=$request->vc_cellar;
        $complemt->typebodywork_id=$request->typebodywork_id;
        $complemt->vc_cylinder=$request->vc_cylinder;
        $complemt->vc_power=$request->vc_power;
        $vehicle->vehiclecomplement()->save($complemt);
        return response()->json(['rpt'=>'success']);
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'error'],400);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Función que elimina un taxi
     */
    public function destroy($id)
    {
      $vehicle=Vehicle::find($id);
      $images=$vehicle->imagevehciles;
      if (empty($images)) {
        if ($vehicle->delete()) {
           return response()->json();
        }
      }else {
        foreach ($vehicle->imagevehciles as $image) {
          unlink(public_path('/vehicle/'.$vehicle->placa.'/'.$image->path));
        }
        try {
            $vehicle->imagevehciles()->delete();
            $vehicle->delete();
            return response()->json(['rpt'=>'success']);
        } catch (\Exception $e) {
            return response()->json(['rtp'=>'exception']);
        }
        return response()->json(['rpt'=>'error']);

      }
    }
    public function destroyLuxury($id){
      $vehicle=Vehicle::findOrFail($id);
      $images=$vehicle->imagevehciles;
      if (empty($images)) {
        if ($vehicle->vehiclecomplement()->delete()) {
           return response()->json();
          }
        }else {
          foreach ($vehicle->imagevehciles as $image) {
            unlink(public_path('/vehicle/'.$vehicle->placa.'/'.$image->path));
          }
          try {
            $vehicle->delete();
            $vehicle->imagevehciles()->delete();
            $vehicle->vehiclecomplement()->delete();
            return response()->json(['rpt'=>'success']);
          } catch (\Exception $e) {
            return response()->json(['rpt'=>'exception']);
          }
          return response()->json(['rpt'=>'error']);

        }
      }
    }
