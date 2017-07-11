<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $table="vehicles";
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['id',
       'placa','veh_model','veh_motor','veh_serie',
       'veh_vin','veh_color','veh_line','state_id',
       'typevehicles_id','typelines_id','brands_id','leveles_id','document',
    ];
    public function vehiclecomplement(){
      return $this->hasOne('App\Models\Vehiclecomplement','id');
    }
    public function typevehicle(){
      return $this->belongsTo('App\Models\Typevehicle');
    }
    public function classvehicle(){
      return $this->belongsTo('App\Models\Classvehicle','class_id');
    }
    public function brandvehicle(){
      return $this->belongsTo('App\Models\Brandvehicle','brand_id');
    }
    public function drivers(){
      return $this->belongsToMany('App\Models\Driver')->withTimestamps();
    }
}
