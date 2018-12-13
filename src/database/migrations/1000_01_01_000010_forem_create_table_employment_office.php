<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableEmploymentOffice extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_employment_office'))
		{
			Schema::create('forem_employment_office', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id')->unsigned();
                $table->integer('profile_id')->unsigned()->nullable();
                $table->string('cod');
				$table->string('name');
				$table->string('slug');

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

                $table->timestamps();
                $table->softDeletes();

                $table->index('slug', 'ix01_forem_employment_office');

                $table->foreign('country_id', 'fk01_forem_employment_office')
                    ->references('id')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id', 'fk02_forem_employment_office')
                    ->references('id')
                    ->on('admin_territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id', 'fk03_forem_employment_office')
                    ->references('id')
                    ->on('admin_territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id', 'fk04_forem_employment_office')
                    ->references('id')
                    ->on('admin_territorial_area_3')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('profile_id', 'fk05_forem_employment_office')
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
	    Schema::dropIfExists('forem_employment_office');
	}
}