<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiclecomplement extends Model
{
  protected $table="vehiclecomplements";
  public $timestamps = false;
  protected $primaryKey = 'id';
  protected $fillable = [
     'vc_brakes','vc_Airbags','vc_head','vc_doors',
     'vc_cabin','vc_passengers','vc_space','vc_sillateria',
     'vc_cellar','typebodywork_id','vc_cylinder','vc_power',
  ];

  public function vehicle(){
    return $this->belognsTo('App\Models\Vehicle','id');
  }
  public function typebodywork(){
    return $this->belongsTo('App\Models\Typebodywork','typebodywork_id');
  }

}
