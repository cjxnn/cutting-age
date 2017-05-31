<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_uploads', function (Blueprint $table) {
            $table->increments('id');
	    	$table->integer('medium_id')->unsigned()->unique()->index();
	    	$table->foreign('medium_id')->references('id')->on('media')->onDelete('cascade');
	    	$table->integer('review_id')->unsigned()->index();
	    	$table->foreign('review_id')->references('id')->on('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('review_uploads');
    }
}
