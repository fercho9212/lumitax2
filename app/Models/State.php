<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
      protected $table="states";
       protected $primaryKey = 'id';
      public function drivers(){
        return $this->hasMany('App\Models\Driver');
      }
}
