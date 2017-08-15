<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stateservice extends Model
{
      protected $table="stateservice";
      protected $primaryKey = 'id';

      public function passengers(){
        return $this->hasMany('App\Models\Passenger');
      }

}
