<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Match_User ;
class User_Reg extends Model
{
    //
    protected $table = 'user_reg';

public $timestamps = false;
  public function userprofile(){
     	return $this->hasOne("App\User_Profile",'user_id');
     }



}
