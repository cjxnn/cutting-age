<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
	    	$table->foreign('user_id')->references('id')->on('users');
	    	$table->integer('review_id')->unsigned()->index();
	    	$table->foreign('review_id')->references('id')->on('reviews');
	    	$table->text('content');
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
        Schema::drop('comments');
    }
}
