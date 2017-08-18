<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $table="driver_passenger";
  public $timestamps = false;
  protected $fillable = [
     'driver_id','passenger_id','date_start','address_start',
     'stateservice_id','payment_id','price','date_end','address_end','description',
  ];
  public function stateservice(){
    return $this->belongsTo('App\Models\State');
  }
  public function payment(){
    return $this->belongsTo('App\Models\Payment');
  }
  public function getHistoryDriver($id){
          $sql="";
          $sql.="select ";
          $sql.="v.placa AS placa, ";
          $sql.="d.dri_name AS nameDriver, ";
          $sql.="u.pas_name As namePassenger,";
          $sql.="h.date_start, ";
          $sql.="h.address_start, ";
          $sql.="s.state, ";
          $sql.="tpa.payment, ";
          $sql.="h.price, ";
          $sql.="h.date_end, ";
          $sql.="h.address_end, ";
          $sql.="h.description ";
          $sql.="FROM ";
          $sql.="driver_passenger h ";
          $sql.="INNER JOIN drivers d ON d.id = h.driver_id ";
          $sql.="INNER JOIN passengers u ON u.id = h.passenger_id ";
          $sql.="INNER JOIN stateservices s ON s.id = h.stateservice_id ";
          $sql.="INNER JOIN payments tpa ON tpa.id = h.payment_id ";
          $sql.="INNER JOIN vehicles v ON v.id = h.vehicle_id ";
          $sql.="WHERE driver_id = ?";
          $history=DB::SELECT($sql,array($id));
          return $history;
  }
  public function getHistoryPassenger($id){
        $sql="";
        $sql.="select ";
        $sql.="v.placa AS placa, ";
        $sql.="d.dri_name AS iddriver, ";
        $sql.="h.date_start, ";
        $sql.="h.address_start, ";
        $sql.="s.state, ";
        $sql.="tpa.payment, ";
        $sql.="h.price, ";
        $sql.="h.date_end, ";
        $sql.="h.address_end, ";
        $sql.="h.description ";
        $sql.="FROM ";
        $sql.="driver_passenger h ";
        $sql.="INNER JOIN drivers d ON d.id = h.driver_id ";
        $sql.="INNER JOIN stateservices s ON s.id = h.stateservice_id ";
        $sql.="INNER JOIN payments tpa ON tpa.id = h.payment_id ";
        $sql.="INNER JOIN vehicles v ON v.id = h.vehicle_id ";
        $sql.="WHERE passenger_id = ?";
        $history=DB::SELECT($sql,array($id));
        return $history;
  }
  public function getAll(){
        $sql="";
        $sql.="select ";
        $sql.="d.dri_cc AS ccdriver, ";
        $sql.="v.placa AS placa, ";
        $sql.="d.dri_name AS driver, ";
        $sql.="u.pas_name AS passenger, ";
        $sql.="h.date_start, ";
        $sql.="h.address_start, ";
        $sql.="s.state, ";
        $sql.="tpa.payment, ";
        $sql.="h.price, ";
        $sql.="h.date_end, ";
        $sql.="h.address_end, ";
        $sql.="h.description ";
        $sql.="FROM ";
        $sql.="driver_passenger h ";
        $sql.="INNER JOIN drivers d ON d.id = h.driver_id ";
        $sql.="INNER JOIN passengers u ON u.id = h.passenger_id ";
        $sql.="INNER JOIN stateservices s ON s.id = h.stateservice_id ";
        $sql.="INNER JOIN payments tpa ON tpa.id = h.payment_id ";
        $sql.="INNER JOIN vehicles v ON v.id = h.vehicle_id ";
        $history=DB::SELECT($sql);
        return $history;
  }
}