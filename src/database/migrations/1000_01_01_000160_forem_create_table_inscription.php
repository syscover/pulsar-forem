<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableInscription extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_inscription'))
		{
			Schema::create('forem_inscription', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id')->unsigned();
                $table->integer('student_id')->unsigned()->nullable();
                $table->integer('certification_id');
                $table->integer('expertise_id');
                $table->integer('work_situation_id');
				$table->string('name');
                $table->string('surname')->nullable();
                $table->string('surname2')->nullable();
                $table->tinyInteger('gender')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->date('birth_date')->nullable();
                $table->string('tin')->nullable();
                $table->string('ssn')->nullable();

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

                // company
                $table->string('company')->nullable();
                $table->integer('sector_id')->nullable();

                $table->text('observations')->nullable();
                $table->boolean('authorization')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('certification_id', 'fk01_forem_inscription')
                    ->references('id')
                    ->on('forem_certification')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('sector_id', 'fk02_forem_inscription')
                    ->references('id')
                    ->on('forem_sector')
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
	    Schema::dropIfExists('forem_inscription');
	}
}