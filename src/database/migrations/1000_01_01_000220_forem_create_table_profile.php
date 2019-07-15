<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableProfile extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_profile'))
		{
			Schema::create('forem_trainer', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
			    $table->string('name');
                $table->boolean('publish')->default(false);

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
	    Schema::dropIfExists('forem_profile');
	}
}