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
          $sql.="p.pas_name,";
          $sql.="h.date_start,";
          $sql.="h.address_start,";
          $sql.="s.state,";
          $sql.="tpa.payment,";
          $sql.="h.price,";
          $sql.="h.date_end,";
          $sql.="h.address_end,";
          $sql.="h.description ";
          $sql.="FROM ";
          $sql.="driver_passenger h ";
          $sql.="INNER JOIN passengers p ON p.id = h.passenger_id ";
          $sql.="INNER JOIN stateservices s ON s.id = h.stateservice_id ";
          $sql.="INNER JOIN payments tpa ON tpa.id = h.payment_id ";
          $sql.="WHERE driver_id = ?";
          $history=DB::SELECT($sql,array($id));
          return $history;
  }
}
