<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Tcontrol extends Model
{
  protected $table="driver_vehicle";
  public $timestamps = false;
  protected $fillable = [
     'driver_id','vehicle_id','opt','dv_no',
     'dv_nit','state_id','dv_date_ex','dv_date_ven','db_qr',
  ];
  public function getHistoryDriver($id){

  }
  public function getHistoryPassenger($id){

  }
  public function getAll(){

  }
}
