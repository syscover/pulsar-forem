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

				$table->increments('id');
                $table->integer('profile_id')->unsigned();
                $table->string('prefix_id')->nullable();                    // pulsar-forem.group_prefix :: ID de centro desde el que controla el grupo
                $table->string('code');                                     //
                $table->string('composite_code');                           // código compuesto por expediente, acción, etc.
                $table->string('name');
                $table->string('slug');
                $table->integer('category_id')->unsigned();                 // forem_category :: Categoría del curso
                $table->integer('target_id')->unsigned();                   // pulsar-forem.targets :: Desempleado/Empleado
                $table->integer('assistance_id')->unsigned();               // pulsar-forem.assistances :: Presencial, Teleformación, etc.
                $table->integer('type_id')->unsigned();                     // pulsar-forem.types :: Oposiciones, Formacion subvencionada, etc.
                $table->boolean('certificate')->default(false);
                $table->string('certificate_code')->nullable();

                // steps in inscription form
                $table->json('steps')->nullable();

                $table->smallInteger('hours');

                $table->decimal('subsidized_amount', 10, 2)->nullable();
                $table->decimal('price', 10, 2)->nullable();
                $table->decimal('price_hour', 10, 2)->nullable();

                $table->text('contents_excerpt')->nullable();
                $table->text('contents')->nullable();
                $table->text('requirements')->nullable();
                $table->text('observations')->nullable();

                // course fields
                $table->integer('action_id')->unsigned();                     // forem_action
                $table->integer('expedient_id')->unsigned();

                // data to create web course sheet
                $table->timestamp('starts_at')->nullable();
                $table->timestamp('ends_at')->nullable();
                $table->string('schedule')->nullable();
                $table->timestamp('selection_date')->nullable();
                $table->boolean('publish')->default(false);
                $table->boolean('open')->default(false);                // if is open the registration
                $table->boolean('featured')->default(false);            // featured this course

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

                // trainers data
                $table->string('trainer_name_1')->nullable();
                $table->string('trainer_hours_1')->nullable();
                $table->string('trainer_name_2')->nullable();
                $table->string('trainer_hours_2')->nullable();
                $table->string('trainer_name_3')->nullable();
                $table->string('trainer_hours_3')->nullable();

                // marketable
                $table->boolean('is_product')->default(false);
                $table->integer('product_id')->unsigned()->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('slug', 'ix01_forem_group');
                $table->unique('slug', 'uk01_forem_group');

                $table->foreign('product_id', 'fk01_forem_group')
                    ->references('id')
                    ->on('market_product')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
                $table->foreign('country_id', 'fk02_forem_group')
                    ->references('id')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id', 'fk03_forem_group')
                    ->references('id')
                    ->on('admin_territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id', 'fk04_forem_group')
                    ->references('id')
                    ->on('admin_territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id', 'fk05_forem_group')
                    ->references('id')
                    ->on('admin_territorial_area_3')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('category_id', 'fk07_forem_group')
                    ->references('id')
                    ->on('forem_category')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('action_id', 'fk08_forem_group')
                    ->references('id')
                    ->on('forem_action')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('expedient_id', 'fk09_forem_group')
                    ->references('id')
                    ->on('forem_expedient')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('profile_id', 'fk10_forem_group')
                    ->references('id')
                    ->on('admin_profile')
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
	    Schema::dropIfExists('forem_group');
	}
}
