<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
      protected $table="states";
       protected $primaryKey = 'id';
      public function vehicles(){
        return $this->hasMany('App\Models\Driver');
      }
      public function passengers(){
        return $this->hasMany('App\Models\Passenger');
      }
}
