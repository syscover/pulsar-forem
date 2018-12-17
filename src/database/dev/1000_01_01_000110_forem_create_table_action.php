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
                $table->string('cod');
                $table->string('name');
                $table->string('slug');
                $table->integer('category_id')->unsigned();         //
                $table->integer('target_id')->unsigned();           // Desempleado, Empleado
                $table->integer('assistance_id')->unsigned();       // Presencial, Teleformación, etc.
                $table->integer('type_id')->unsigned();             // Oposiciones, Formacion subvencionada, etc.

                $table->smallInteger('hours');

                $table->boolean('online')->default(false);

                $table->boolean('is_free')->default(false);
                $table->decimal('price',10, 2);
                $table->decimal('price_hour',10, 2);

                $table->text('contents')->nullable();
                $table->text('requirements')->nullable();
                $table->text('observations')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('slug', 'ix01_forem_action');
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