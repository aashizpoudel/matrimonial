<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesiredProfile extends Model
{
    //
    protected $table="desired_profiles";
    protected $fillable = ['user_id'];
}
