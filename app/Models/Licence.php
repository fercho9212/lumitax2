<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
  protected $table="drivers";
  protected $fillable = [
     'lic_no','lic_validity','category_id','type_id',
  ];
  public function driver(){
    return $this->belognsTo('App\Models\Drivers');
  }

}
