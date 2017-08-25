<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typesrole extends Model
{
      protected $table="typesroles";
      protected $primaryKey = 'id';
      protected $fillable = [
          'id','type',
      ];
      public function users(){
        return $this->hasMany('App\Models\User','typesrole_id');
      }

}
