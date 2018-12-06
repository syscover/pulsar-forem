<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableStudent extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_student'))
		{
			Schema::create('forem_student', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id')->unsigned();
				$table->string('name');
                $table->string('surname_1')->nullable();
                $table->string('surname_2')->nullable();
                $table->tinyInteger('gender')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->date('birth_date')->nullable();
                $table->string('tin')->nullable();

                // geolocation data
                $table->string('country_id', 2)->nullable();
                $table->string('territorial_area_1_id', 6)->nullable();
                $table->string('territorial_area_2_id', 10)->nullable();
                $table->string('territorial_area_3_id', 10)->nullable();
                $table->string('zip')->nullable();
                $table->string('locality')->nullable();
                $table->string('address')->nullable();
                $table->decimal('latitude', 17, 14)->nullable();
                $table->decimal('longitude', 17, 14)->nullable();


				$table->boolean('active')->default(false);
				$table->text('description')->nullable();

                $table->timestamps();
                $table->softDeletes();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::dropIfExists('forem_student');
	}
}