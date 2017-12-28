<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User_Reg;
class User_Profile extends Model
{
    //
    protected $table = 'user_profile';
     protected $primaryKey = 'user_id';
     public $incrementing =false;

   public function reguser(){
       return $this->belongsTo('\App\User_Reg','user_id');
   }

   public function desiredprofile(){
   		return $this->hasOne('\App\DesiredProfile','user_id');
   }

   public function annualincome(){
   	return $this->hasOne('\App\AnnualIncome','annual_income','id')
   }
        
}
