<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classvehicle extends Model
{
  protected $table="classvehicles";
  protected $fillable = [
     'class',
  ];
  public $timestamps = false;
}
