<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    protected $table="drivers";
    protected $fillable = [
       'dri_name','dri_last','dri_cc','dri_address',
       'dri_movil','dri_phone','dri_photo','dri_location',
       'messages_id','email', 'password','states_id','dri_qual',
    ];
    public $timestamps = true;
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
       'dri_cc', 'remember_token',
    ];

    public function state(){
      return $this->belongsTo('App\Models\State');
    }
}
