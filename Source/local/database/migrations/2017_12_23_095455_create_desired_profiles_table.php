<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesiredProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desired_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('age_from')->default(18);
            $table->integer('age_to')->default(23);
            $table->integer('height_from')->default(155);
            $table->integer('height_to')->default(160);
            $table->string('marital_status')->default('any');
            $table->string('country')->default('any');
            $table->string('religion')->default('any');
            $table->string('caste')->default('any');
            $table->string('mother_tongue')->default('any');
            $table->string('education')->default('any');
            $table->string('occupation')->default('any');
            $table->string('employed_in')->default('any');
            $table->integer('annual_income_from')->default(0);
            $table->integer('annual_income_to')->default(25000);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('desired_profiles');
    }
}
