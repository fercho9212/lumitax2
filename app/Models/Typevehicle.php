<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typevehicle extends Model
{
  protected $table="typevehicles";
  protected $fillable = [
     'type',
  ];
  public $timestamps = false;

  public function vehicles(){
    return $this->hasMany('App\Models\Vehicle');
  }
}
