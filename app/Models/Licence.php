<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
  protected $table="licences";
  public $timestamps = false;
  protected $primaryKey = 'id';
  protected $fillable = [
     'lic_no','lic_validity','category_id','type_id',
  ];
  public function driver(){
    return $this->belognsTo('App\Models\Driver','id');
  }
  public function categorylicence(){
    return $this->belongsTo('App\Models\Categorylicence','category_id');
  }
  public function typeslicence(){
    return $this->belongsTo('App\Models\Typeslicence','type_id');
  }

}
