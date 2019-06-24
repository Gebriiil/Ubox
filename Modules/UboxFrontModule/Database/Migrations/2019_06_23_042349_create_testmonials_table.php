<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestmonialsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('testmonials', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('photo')->nullable();
			$table->string('name')->nullable();
			$table->string('job_title');
			$table->text('quote');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('testmonials');
	}
}
