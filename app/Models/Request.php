<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
      protected $table="requests";
      protected $primaryKey = 'id';
/*
      public function passengers(){
        return $this->hasMany('App\Models\Passenger');
      }
      */
      public function passengers(){
        return $this->belongsToMany('App\Models\Passenger')->withTimestamps();
      }

}
