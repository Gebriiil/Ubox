<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('image');
                $table->date('start_at');
                $table->date('end_at');
                $table->bigInteger('training_cat_id')->unsigned();
                $table->foreign('training_cat_id')->references('id')->on('training_cat')->onDelete('cascade');
                $table->timestamps();
            });

        Schema::create('training_translations', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('training_id')->unsigned();
                $table->string('name');
                $table->text('desc');
                $table->string('locale')->index();
                $table->unique(['training_id','locale']);
                $table->foreign('training_id')->references('id')->on('training')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training');
    }
}

