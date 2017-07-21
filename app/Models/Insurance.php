<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
  protected $table="insurance";
  public $timestamps = false;
  protected $primaryKey = 'id';
  protected $fillable = [
     'ins_name','ins_code','ins_description',
  ];
}
