<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorylicence extends Model
{
  protected $table="categorylicences";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = [
     'id','category',
  ];
  public function licences(){
    return $this->hasMany('App\Models\Licence');
  }
}
