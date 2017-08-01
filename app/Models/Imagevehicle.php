<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagevehicle extends Model
{
  protected $table="imagevehicles";
  public $timestamps = true;
  protected $primaryKey = 'id';
  protected $fillable = [
     'img_name','path','vehicle_id',
  ];
  public function vehicle(){
    return $this->belongsTo('App\Models\Vehicle');
  }
}
