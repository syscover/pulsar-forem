<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableLocality extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_locality'))
		{
			Schema::create('forem_locality', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->integer('foco_code')->unsigned();
                $table->integer('province_id')->unsigned()->nullable();
				$table->string('name');

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('province_id', 'fk01_forem_locality')
                    ->references('id')
                    ->on('forem_province')
                    ->onDelete('set null')
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
	    Schema::dropIfExists('forem_locality');
	}
}