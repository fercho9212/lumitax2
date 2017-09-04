<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeregister extends Model
{
      protected $table="typeregisters";
       protected $primaryKey = 'id';
       protected $fillable = [
           'id','type',
       ];
      public function drivers(){
        return $this->hasMany('App\Models\Driver');
      }
      public function passengers(){
        return $this->hasMany('App\Models\Passenger');
      }
}
