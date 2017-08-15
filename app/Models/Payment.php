<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
      protected $table="payments";
       protected $primaryKey = 'id';
      public function drivers(){
        return $this->hasMany('App\Models\History');
      }
}
