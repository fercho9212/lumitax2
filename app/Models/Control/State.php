<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function drivers(){
      return $this->hasMany('App\Models\Control\Passenger');
    }
}
