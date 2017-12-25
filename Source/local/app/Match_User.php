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

   public function reguser(){
       return $this->belongsTo('\App\User_Reg','user_id');
   }
        
}
