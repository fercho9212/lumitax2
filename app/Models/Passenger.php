<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Passenger extends Authenticatable
{
    use Notifiable;
      protected $table="passengers";
      protected $fillable = [
        'pas_name','pas_last','pas_cc','email', 'password','pas_movil','pas_username','pas_location','pas_qual','payments_id','state_id',
    ];
      protected $hidden = [
     'password', 'remember_token',
  ];

}
