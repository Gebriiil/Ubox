<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_cat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('training_cat_translations', function(Blueprint $table)
            {
                $table->increments('id');
                $table->bigInteger('training_category_id')->unsigned();
                $table->string('name');
                $table->text('desc');
                $table->string('locale')->index();

                $table->unique(['training_category_id','locale']);
                $table->foreign('training_category_id')->references('id')->on('training_cat')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training__categories');
    }
}
