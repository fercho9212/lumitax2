<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
  protected $table="adverimages";
  public $timestamps = true;
  protected $primaryKey = 'id';
  protected $fillable = [
     'img_name','path',
  ];
}
