<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableExpedient extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_expedient'))
		{
			Schema::create('forem_expedient', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id');
                $table->string('code');                         // 8 characters
                $table->integer('modality_id')->unsigned();             // pulsar-forem.modalities :: modalidad de curso en caso de ser subvencionado
                $table->smallInteger('year');
                $table->string('name');
                $table->timestamp('starts_at')->nullable();
                $table->timestamp('ends_at')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('code', 'ix01_forem_expedient');
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
	    Schema::dropIfExists('forem_expedient');
	}
}