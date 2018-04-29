<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnualIncome extends Model
{

	
	protected $fillable = ['from','to'];
    //
   protected $table = 'annual_incomes';

}
