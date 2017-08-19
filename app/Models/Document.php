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

}
