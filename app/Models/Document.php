<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  protected $table="documents";
  public $timestamps = false;
  protected $fillable = [
     'vehicle_id','insurance_id','description','doc_datei',
     'doc_datef','doc_company','doc_policy',

  ];

  public function insurance(){
    return $this->belongsTo('App\Models\Insurance','insurance_id');
  }
  public function countDocuVen($idvehicle){
    $sql="";
    $sql.="select count(*) as total FROM vehicles v ";
    $sql.="INNER JOIN documents d ON d.vehicle_id = v.id ";
    $sql.=" WHERE ";
    $sql.="v.id =? ";
    $sql.="AND ";
    $sql.=" (d.doc_datef BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH))";
    $query=DB::select($sql,array($idvehicle));
    $cant=$query[0]->total;
    return $cant;
  }
  //Consulta documentos proximos a vencer
  public function docuExpired(){
    $sql="";
    $sql.=" SELECT ";
    $sql.=" v.id as idv, ";
    $sql.=" v.placa,";
    $sql.=" i.ins_name,";
    $sql.=" d.doc_datei,";
    $sql.=" doc_datef,";
    $sql.=" doc_company";
    $sql.=" FROM";
    $sql.=" documents d ";
    $sql.=" INNER JOIN vehicles v ON d.vehicle_id = v.id ";
    $sql.=" INNER JOIN insurance i ON i.id = d.insurance_id ";
    $sql.=" WHERE ";
    $sql.=" doc_datef BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH) ";
    $query=DB::select($sql);
    return $query;
  }
  //Consulta documentos ya 
  public function expirated(){
    $sql="";
    $sql.=" select ";
    $sql.=" v.id as idv, ";
    $sql.=" v.placa, ";
    $sql.=" i.ins_name, ";
    $sql.=" d.doc_datei, ";
    $sql.=" doc_datef, ";
    $sql.=" doc_company ";
    $sql.=" FROM ";
    $sql.=" documents d ";
    $sql.=" INNER JOIN vehicles v ON d.vehicle_id = v.id ";
    $sql.=" INNER JOIN insurance i ON i.id = d.insurance_id ";
    $sql.=" WHERE ";
    $sql.=" doc_datef <= CURRENT_TIMESTAMP ";
    $query=DB::select($sql);
    return $query;
  }

}
