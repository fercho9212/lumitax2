<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $table="vehicles";
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
       'placa','veh_model','veh_motor','veh_serie',
       'veh_vin','veh_color','veh_line','state_id',
       'typevehicles_id','typelines_id','brands_id','leveles_id',
    ];
    public function vehiclecomplement(){
      return $this->hasOne('App\Models\Vehiclecomplement','id');
    }

}
