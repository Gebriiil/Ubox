<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('job_categories_translations', function(Blueprint $table)
            {
                $table->increments('id');
                $table->bigInteger('job_category_id')->unsigned();
                $table->string('name');
                $table->text('desc');
                $table->string('locale')->index();
                $table->unique(['job_category_id','locale']);
                $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_categories');
    }
}
