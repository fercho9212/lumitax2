<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
  protected $table = 'passengers';
  public $timestamps = true;
 protected $filltable= ['id','pas_name', 'pas_last', 'pas_mail', 'pas_movil', 'pas_psw','states_id'];
}
