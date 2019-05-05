<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('image');
                $table->bigInteger('project__cat_id')->unsigned();
                $table->foreign('project__cat_id')->references('id')->on('project__cat')->onDelete('cascade');
                $table->timestamps();
            });

        Schema::create('project_translations', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('project_id')->unsigned();
                $table->string('name');
                $table->text('desc');
                $table->string('locale')->index();

                $table->unique(['project_id','locale']);
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}

