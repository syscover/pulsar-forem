<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableCourse extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_course'))
		{
			Schema::create('forem_course', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->integer('group_id')->unsigned();

                // group
                $table->string('group_name')->nullable();
                $table->string('group_starts_at')->nullable();
                $table->string('group_ends_at')->nullable();

                // data student
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->string('surname2')->nullable(); 
                $table->string('gender')->nullable();
                $table->string('birth_date')->nullable();  
                $table->string('tin')->nullable();
                $table->string('ssn')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();
                $table->string('address')->nullable();
                $table->string('province')->nullable();
                $table->string('zip')->nullable();
                $table->string('locality')->nullable();

                // unemployment data
                $table->string('unemployed_state')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('group_id', 'forem_course_group_id_fk')
                    ->references('id')
                    ->on('forem_group')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
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
	    Schema::dropIfExists('forem_course');
	}
}