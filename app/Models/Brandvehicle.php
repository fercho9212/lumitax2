<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brandvehicle extends Model
{
  protected $table="brandvehicles";
  protected $fillable = [
     'brand',
  ];
  public $timestamps = false;
  
  public function vehicles(){
    return $this->hasMany('App\Models\Vehicle');
  }
}
