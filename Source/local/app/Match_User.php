<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User_Reg;
class Match_User extends Model
{
    //
    protected $table = 'user_profile';
     protected $primaryKey = 'user_id';
     public $incrementing =false;

   
         public function user_reg(){
    	$this->hasOne('App\User_Reg','id');
    	}
}
