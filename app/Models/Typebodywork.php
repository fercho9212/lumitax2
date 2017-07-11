<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typebodywork extends Model
{
  protected $table="typebodyworks";
  protected $fillable = [
     'bodywork',
  ];
  public $timestamps = false;

  public function vehiclecomplements(){
    return $this->hasMany('App\Models\Vehiclecomplement');
  }
}