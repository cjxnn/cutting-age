<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
	    	$table->integer('patient_id')->unsigned()->index();
	    	$table->foreign('patient_id')->references('id')->on('patients');
	    	$table->string('title')->index()->unique();
	    	$table->text('content');
            $table->string('location')->index()->nullable();
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
        Schema::drop('questions');
    }
}
