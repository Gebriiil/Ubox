<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project__cat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        Schema::create('project__cat_translations', function(Blueprint $table)
            {
                $table->increments('id');
                $table->bigInteger('project__cat_id')->unsigned();
                $table->string('name');
                $table->text('desc');
                $table->string('locale')->index();

                $table->unique(['project__cat_id','locale']);
                $table->foreign('project__cat_id')->references('id')->on('project__cat')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project__cat');
    }
}
