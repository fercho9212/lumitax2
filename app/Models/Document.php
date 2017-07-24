<?php

namespace App\Models;

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

}
