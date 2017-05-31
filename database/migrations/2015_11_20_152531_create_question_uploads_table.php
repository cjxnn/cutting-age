<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medium_id')->unsigned()->unique()->index();
		    $table->foreign('medium_id')->references('id')->on('media')->onDelete('cascade');
		    $table->integer('question_id')->unsigned()->index();
	    	$table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question_uploads');
    }
}
