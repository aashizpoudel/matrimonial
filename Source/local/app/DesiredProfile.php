<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesiredProfile extends Model
{
    //
    protected $table="desired_profiles";
    protected $fillable = ['user_id','age_from','age_to','height_from','height_to','marital_status','country','religion','caste','mother_tongue'
    ,'education','occupation','employed_in','annual_income'
    ];
}
