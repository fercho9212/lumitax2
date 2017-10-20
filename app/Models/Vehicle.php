<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Vehicle extends Model
{
    //
    protected $table="vehicles";
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['id',
       'placa','veh_model','veh_motor','veh_serie',
       'veh_vin','veh_color','veh_line','state_id',
       'typevehicles_id','typelines_id','brands_id','leveles_id','document','baul_id','space_id',
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
    public function state(){
      return $this->belongsTo('App\Models\State');
    }
    public function drivers(){
      return $this->belongsToMany('App\Models\Driver')->withTimestamps();
    }
    public function imagevehciles(){
      return $this->hasMany('App\Models\Imagevehicle');
    }

    public function baul(){
      return $this->belongsTo('App\Models\Baul','baul_id');
    }
    public function spacevehicle(){
      return $this->belongsTo('App\Models\Baul','space_id');
    }

    public function typeregister(){
      return $this->belongsTo('App\Models\Typeregister','register_id');
    }

    public function typeregisteropt(){
      $sql="";
      $sql.="select COUNT(v.id) as total, t.type ";
      $sql.="FROM vehicles v ";
      $sql.="JOIN typeregisters t  ON v.register_id=t.id  ";
      $sql.="GROUP BY  t.type";
      $rpt=DB::SELECT($sql);
      return $rpt;
    }

}
