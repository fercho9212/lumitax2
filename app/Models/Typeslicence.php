<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeslicence extends Model
{
  protected $table="typeslicences";
  protected $fillable = [
     'type',
  ];
  public $timestamps = false;
  
  public function licences(){
    return $this->hasMany('App\Models\Licence');
  }
}
