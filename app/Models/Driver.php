<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class Driver extends Authenticatable
{
    protected $table="drivers";
    protected $fillable = [
       'dri_name','dri_last','dri_cc','dri_address',
       'dri_movil','dri_phone','dri_photo','dri_location',
       'messages_id','email', 'password','state_id','dri_qual','token_api'
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
    public function apistate(){
      return $this->belongsTo('App\Models\Apistate');
    }
    public function licence(){
      return $this->hasOne('App\Models\Licence','id');
    }
    public function vehicles(){
      return $this->belongsToMany('App\Models\Vehicle')->withTimestamps();
    }
    public function qual($iddriver,$value){
      try {
        $cant=DB::SELECT('select  COUNT(*) as sum FROM driver_passenger d WHERE d.driver_id=?',array($iddriver));
        $cantidad=$cant[0]->sum;
        $acum=DB::SELECT('select dri_qual as qualification from drivers WHERE id=?',array($iddriver));
        $acumulado=$acum[0]->qualification;
        $qualification=(($acumulado*$cantidad)+$value)/($cantidad+1);
        DB::UPDATE('update drivers set dri_qual=?  WHERE id=? ', array($qualification,$iddriver));
          $rpt='success';
        } catch (Exception $e) {
          $rpt='error';
        }
      return $rpt;
    }

    public function licenceexpirated($iddriver){
      $sql="";
      $sql.="select l.lic_validity AS vigencia ";
      $sql.="FROM licences l  ";
      $sql.="INNER JOIN drivers d on l.id=d.id  ";
      $sql.="where (l.lic_validity BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH)) ";
      $sql.="AND d.id=? ";
      $rpt=DB::SELECT($sql,array($iddriver));
      return $rpt;
    }
//update driver_vehicle set opt=0  WHERE driver_id=1 and vehicle_id=1
}
