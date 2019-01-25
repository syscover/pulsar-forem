<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableForemCenter extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_center'))
		{
			Schema::create('forem_center', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
				$table->string('name');
				$table->integer('profile_id')->unsigned();

                $table->timestamps();
                $table->softDeletes();
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
	    Schema::dropIfExists('forem_center');
	}
}