<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableTrainer extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_trainer'))
		{
			Schema::create('forem_trainer', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->integer('profile_id')->unsigned();                              // pulsar-forem.profiles
                $table->smallInteger('academic_level_id')->unsigned()->nullable();      // pulsar-forem.academic_levels
			    $table->string('name');
                $table->string('surname')->nullable();
                $table->string('surname2')->nullable();
                $table->tinyInteger('gender_id')->nullable();
                $table->date('birth_date')->nullable();
                $table->string('tin')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();
                $table->json('availabilities')->nullable();                             // related with pulsar-forem.availabilities
                $table->boolean('has_communication')->default(false);                   // authorization RGPD
                $table->boolean('has_authorization')->default(false);

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

                // special fields
                $table->boolean('is_register_jccm')->nullable()->default(false);
                $table->string('specialty')->nullable();
                $table->json('categories')->nullable();                                 // forem_category table
                $table->tinyInteger('teacher_training')->nullable();                    // pulsar-forem.teacher_trainings
                $table->smallInteger('teaching_months')->unsigned()->nullable();
                $table->smallInteger('occupation_months')->unsigned()->nullable();

				$table->text('description')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('profile_id', 'forem_trainer_profile_id_fk')
                    ->references('id')
                    ->on('forem_profile')
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
	    Schema::dropIfExists('forem_trainer');
	}
}