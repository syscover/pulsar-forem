<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableSector extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_sector'))
		{
			Schema::create('forem_sector', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
				$table->string('name');
				$table->string('slug');

                $table->timestamps();
                $table->softDeletes();

                $table->index('slug', 'ix01_forem_sector');
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
	    Schema::dropIfExists('forem_sector');
	}
}