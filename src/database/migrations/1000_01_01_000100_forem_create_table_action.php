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
		if (! Schema::hasTable('forem_action'))
		{
			Schema::create('forem_action', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id')->unsigned();
                $table->string('name');
                $table->string('slug');
                $table->integer('sector_id')->unsigned();       //
                $table->integer('target_id')->unsigned();       // Desempleado, Empleado
                $table->integer('modality_id')->unsigned();     // Presencial, Teleformación, etc.
                $table->integer('type_id')->unsigned();         // Oposiciones, Formacion subvencionada, etc.

                $table->smallInteger('hours');

                $table->decimal('price',10, 2);
                $table->decimal('price_hour',10, 2);

                $table->boolean('publish');

                $table->timestamp('starts_at')->nullable();
                $table->timestamp('ends_at')->nullable();


                $table->timestamps();
                $table->softDeletes();

				$table->foreign('lang_id', 'fk01_market_category')
					->references('id')
					->on('admin_lang')
					->onDelete('restrict')
					->onUpdate('cascade');

                $table->index('slug', 'ix01_forem_course');
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
	    Schema::dropIfExists('forem_action');
	}
}