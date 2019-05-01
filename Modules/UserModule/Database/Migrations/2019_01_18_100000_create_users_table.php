<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			//$table->string('name')->nullable();
			$table->string('first_name');
			$table->string('email')->nullable();
			$table->string('last_name');
			$table->string('phone')->unique();
			$table->string('gender')->nullable();
			$table->string('birth_date')->nullable();
			$table->string('affiliate_code')->nullable();
			$table->string('rank')->nullable();
			$table->string('device_id')->nullable();
			$table->string('platform')->nullable();
			$table->integer('parent_id')->unsigned()->nullable();
			$table->string('num_of_people')->nullable();
			$table->double('wallet')->nullable()->default(0);
			$table->timestamp('wallet_expired_at')->nullable();

			$table->string('password')->nullable();;
			$table->rememberToken();

			$table->integer('city_id')->unsigned()->nullable();
			$table->integer('zone_id')->unsigned()->nullable();
			$table->integer('government_id')->unsigned()->nullable();
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
			$table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
			$table->foreign('government_id')->references('id')->on('governments')->onDelete('set null');

			$table->foreign('parent_id')->references('id')->on('users')->onUpdate('set null');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
