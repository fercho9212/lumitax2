<?php

namespace App\Models\Control;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Passenger extends Authenticatable
{
  protected $table = 'passengers';
  public $timestamps = true;
  protected $filltable= ['id','pas_name', 'pas_last', 'pas_mail', 'pas_movil', 'password','states_id'];

  protected $hidden = [
      'password', 'remember_token',
  ];

  public function state(){
    return $this->belongsTo('App\Models\State');
  }
}
