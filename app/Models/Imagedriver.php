<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagedriver extends Model
{
  protected $table="imagedrivers";
  public $timestamps = true;
  protected $primaryKey = 'id';
  protected $fillable = [
     'img_name','path','driver_id',
  ];
  
  public function driver(){
    return $this->belongsTo('App\Models\Driver');
  }


}
