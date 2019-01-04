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
				
				$table->increments('id');
				$table->string('name');
                $table->string('surname')->nullable();
                $table->string('surname2')->nullable();
                $table->tinyInteger('gender_id')->nullable();
                $table->date('birth_date')->nullable();
                $table->string('tin')->nullable();
                $table->string('ssn')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();

                $table->text('observations')->nullable();

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