<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Match_User ;
class User_Reg extends Model
{
    //
    protected $table = 'user_reg';


  public function user_profile(){
     	$this->belongsTo("App\Match_User");
     }



}
