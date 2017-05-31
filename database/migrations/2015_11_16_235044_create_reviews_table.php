<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
	    	$table->integer('procedure_id')->unsigned()->index();
	    	$table->foreign('procedure_id')->references('id')->on('procedures');
	    	$table->integer('patient_id')->unsigned()->index();
	    	$table->foreign('patient_id')->references('id')->on('patients');
	    	$table->string('title')->index()->unique();
	    	$table->integer('cost')->unsigned()->nullable();
	    	$table->enum('worth_it', array('yes','no','unsure','yet'));
        	$table->text('content');
	    	$table->string('doctor')->nullable();
	    	$table->string('location')->index();
	    	$table->text('commemnt_on_doctor')->nullable();
        	$table->enum('overall', array('0','1','2','3','4','5'))->nullable();
	    	$table->enum('manner', array('0','1','2','3','4','5'))->nullable();
	    	$table->enum('answer', array('0','1','2','3','4','5'))->nullable();
	    	$table->enum('after_service', array('0','1','2','3','4','5'))->nullable();
	    	$table->enum('company', array('0','1','2','3','4','5'))->nullable();
        	$table->enum('responsiveness', array('0','1','2','3','4','5'))->nullable();	
		$table->enum('professionlism', array('0','1','2','3','4','5'))->nullable();
	    	$table->enum('transaction', array('0','1','2','3','4','5'))->nullable();
	    	$table->enum('waiting', array('0','1','2','3','4','5'))->nullable();
        	$table->enum('deleted', array('y','n'));
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
        Schema::drop('reviews');
    }
}
