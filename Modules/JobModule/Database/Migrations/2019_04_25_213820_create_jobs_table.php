<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('jobs', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('image');
			$table->enum('status', ['active', 'notactive']);
			$table->timestamps();
		});

		Schema::create('job_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();;
			$table->text('description')->nullable();
			$table->string('meta_title')->nullable();
			$table->text('meta_desc')->nullable();
			$table->string('meta_keywords')->nullable();
			$table->string('slug')->nullable();
			$table->string('locale')->index();
			$table->bigInteger('job_id')->unsigned();
			$table->unique(['job_id', 'locale']);
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('jobs');
	}
}
