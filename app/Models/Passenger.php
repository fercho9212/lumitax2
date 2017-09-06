<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Passenger extends Authenticatable
{
    use Notifiable;
      protected $table="passengers";
      protected $fillable = [
        'pas_name','pas_last','pas_cc','email', 'password','pas_movil','pas_username','pas_location','pas_qual','payments_id','state_id','token_api'
    ];
      protected $hidden = [
     'password', 'remember_token',
  ];

      public function state(){
        return $this->belongsTo('App\Models\State');
      }

      public function stateServices(){
        return $this->belongsToMany('App\Models\Stateservice')->withTimestamps();
      }

      public function qual($id_passenger,$value){
          try {
            $cant=DB::SELECT('select  COUNT(*) as sum FROM driver_passenger d WHERE d.passenger_id=?',array($id_passenger));
            $cantidad=$cant[0]->sum;
            $acum=DB::SELECT('select pas_qual as qualification from passengers WHERE id=?',array($id_passenger));
            $acumulado=$acum[0]->qualification;
            $qualification=(($acumulado*$cantidad)+$value)/($cantidad+1);
            DB::UPDATE('update passengers set pas_qual=?  WHERE id=?',array($qualification,$id_passenger));
            $rpt='success';
          } catch (Exception $e) {
            $rpt='error';
          }
        return $rpt;
      }

}
