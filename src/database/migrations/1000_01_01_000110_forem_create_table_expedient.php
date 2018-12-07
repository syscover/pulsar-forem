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

				$table->increments('id')->unsigned();
                $table->string('cod');
                $table->string('name');
                $table->smallInteger('year');
                $table->timestamp('starts_at')->nullable();
                $table->timestamp('ends_at')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('cod', 'ix01_forem_expedient');
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