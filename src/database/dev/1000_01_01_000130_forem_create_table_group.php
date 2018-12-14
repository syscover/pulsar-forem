<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableGroup extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_group'))
		{
			Schema::create('forem_group', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id')->unsigned();
                $table->integer('modality_id');                 // modalidad de curso en caso de ser subvencionado
                $table->string('cod');
                $table->integer('action_id');
                $table->integer('expedient_id');
                $table->string('name');
                $table->string('slug');

                $table->integer('sector_id')->unsigned();       //
                $table->integer('target_id')->unsigned();       // Desempleado, Empleado
                $table->integer('modality_id')->unsigned();     // Presencial, Teleformación, etc.
                $table->integer('type_id')->unsigned();         // Oposiciones, Formacion subvencionada, etc.

                $table->smallInteger('hours');

                $table->boolean('online')->default(false);

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

                //
                $table->timestamp('starts_at')->nullable();
                $table->timestamp('ends_at')->nullable();
                $table->timestamp('selection_date')->nullable();
                $table->boolean('open')->default(false);    // if is open the registration

                $table->boolean('is_free')->default(false);
                $table->decimal('price',10, 2);
                $table->decimal('price_hour',10, 2);

                $table->string('schedule')->nullable();

                $table->boolean('publish')->default(false);

                $table->text('contents')->nullable();
                $table->text('requirements')->nullable();
                $table->text('observations')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('slug', 'ix01_forem_group');
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
	    Schema::dropIfExists('forem_group');
	}
}