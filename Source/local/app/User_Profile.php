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
     public $timestamps = false;
     protected $fillable = ['annual_income','user_visibility','profile_strength','upgrade_status'
     ,'google_plus','twitter','facebook','about_my_family','sister_married','no_of_brothers'
     ,'mothers_status','fathers_status','occupation_in_detail','college','other_occupation'
     ,'other_residing_state','district','other_residing_city','other_highesteducation','state' //state id
     ,'district'//district is id
     ,'citizenship','other_citizenship','country_livingin','other_countrylivingin','zodiac_starsign'
     ,'eating_habits','familystatus','star'/*id */,'name','religion','other_religion','caste','other_caste'
     ,'path','img_status','height','weight','marital_status','children','body_type','complexion','mother_tongue'
     ,'education'/*id*/,'other_education','occupation'/*id*/,'annual_income','family_values','family_type','employedin'
     ,'physical_status','package_payment' 
     ];

   public function reguser(){
       return $this->belongsTo('\App\User_Reg','user_id');
   }

   public function desiredprofile(){
   		return $this->hasOne('\App\DesiredProfile','user_id');
   }

   public function annualincome(){
   	return $this->hasOne('\App\AnnualIncome','id','annual_income');
   }
        
}
