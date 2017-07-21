<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apistate extends Model
{
  protected $table="apistates";
  protected $fillable = [
     'api_state',
  ];
  public $timestamps = false;

  public function drivers(){
    return $this->hasMany('App\Models\Drivers');
  }
}
