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
        Schema::create('project__categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        Schema::create('project__category_translations', function(Blueprint $table)
            {
                $table->increments('id');
                $table->bigInteger('project_category_id')->unsigned();
                $table->string('name');
                $table->text('desc');
                $table->string('locale')->index();

                $table->unique(['project_category_id','locale']);
                $table->foreign('project_category_id')->references('id')->on('project__categories')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project__categories');
    }
}
