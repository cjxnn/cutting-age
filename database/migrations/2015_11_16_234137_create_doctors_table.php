<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
	    	$table->integer('user_id')->unsigned()->unique()->index();
	    	$table->foreign('user_id')->references('id')->on('users');
	    	$table->string('firstName')->index();
	    	$table->string('lastName')->index();
	    	$table->string('city')->index();
	    	$table->string('country')->index();
	    	$table->string('website')->nullable();
	    	$table->string('certification')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctors');
    }
}
