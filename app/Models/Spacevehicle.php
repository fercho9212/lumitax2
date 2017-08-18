<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spacevehicle extends Model
{
        protected $table="sizes";
        protected $primaryKey = 'id';
        public $timestamps = false;
        protected $fillable = [
          'id','size'
       ];
      public function vehicles(){
        return $this->hasMany('App\Models\Vehicle');
      }

}
