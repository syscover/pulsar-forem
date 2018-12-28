<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableInscription extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_inscription'))
		{
			Schema::create('forem_inscription', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id')->unsigned();
                $table->integer('student_id')->unsigned()->nullable();                  // if is student registered
                $table->string('name');                                                 // <nombre></nombre>
                $table->string('surname')->nullable();                                  // <primer_apellido></primer_apellido>
                $table->string('surname2')->nullable();                                 // <segundo_apellido></segundo_apellido>
                $table->tinyInteger('gender_id')->unsigned()->nullable();               // <sexo></sexo>
                $table->date('birth_date')->nullable();                                 // <fecha_nacimiento></fecha_nacimiento>
                $table->string('tin')->nullable();                                      // <nif></nif>
                $table->string('ssn')->nullable();
                $table->string('email')->nullable();                                    // <email></email>
                $table->string('phone')->nullable();                                    // <telefono></telefono>
                $table->string('mobile')->nullable();                                   // <movil></movil>


                // foco
                $table->string('code')->nullable();                                     // <expediente_grupo></expediente_grupo>
                $table->boolean('has_registry')->default(false);                  // <tiene_registro_clm></tiene_registro_clm>
                $table->string('registry_number')->nullable();                          // <num_registro_clm></num_registro_clm>
                $table->timestamp('registry_date')->nullable();                         // <fecha_registro_clm></fecha_registro_clm>
                $table->tinyInteger('document_type_id')->unsigned()->nullable();        // <id_tipo_documento_alumno></id_tipo_documento_alumno>
                $table->string('document_number')->nullable();                          // <numero_documento_alumno></numero_documento_alumno>
                $table->tinyInteger('road_type_id')->unsigned()->nullable();            // <id_tipo_via></id_tipo_via>
                $table->string('zip')->nullable();                                      // <cod_postal></cod_postal>
                $table->string('address')->nullable();                                  // <direccion></direccion>

                $table->boolean('has_driving_license')->default(false);                       // <tiene_carnet_conducir></tiene_carnet_conducir>
                $table->json('driving_licenses')->nullable();                                       // <id_carnet_conducir></id_carnet_conducir>

                $table->smallInteger('employment_situation_id')->unsigned()->nullable();            // <id_situacion_laboral></id_situacion_laboral>

                $table->timestamp('registration_date')->default(DB::raw('CURRENT_TIMESTAMP'));      // <fecha_inscripcion></fecha_inscripcion>
                $table->integer('employment_office_id')->unsigned()->nullable();                    // <id_oficina_empleo></id_oficina_empleo>
                $table->tinyInteger('unemployed_situation_id')->unsigned()->nullable();             // <id_situacion_desempleo></id_situacion_desempleo>

                $table->tinyInteger('professional_category_id')->unsigned()->nullable();            // <id_categoria_profesional></id_categoria_profesional>












                // inscription
                $table->integer('certification_id');
                $table->integer('expertise_id');
                $table->integer('work_situation_id');


                // geolocation data
                $table->string('country_id', 2)->nullable();
                $table->string('territorial_area_1_id', 6)->nullable();
                $table->string('territorial_area_2_id', 10)->nullable();
                $table->string('territorial_area_3_id', 10)->nullable();

                $table->string('locality')->nullable();

                $table->decimal('latitude', 17, 14)->nullable();
                $table->decimal('longitude', 17, 14)->nullable();

                // company
                $table->string('company')->nullable();
                $table->integer('sector_id')->nullable();

                $table->text('observations')->nullable();
                $table->boolean('authorization')->default(false);
                $table->boolean('exported')->default(false);                    // check if this inscription have been exported to FOCO

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('employment_office_id', 'fk01_forem_inscription')
                    ->references('id')
                    ->on('forem_employment_office')
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
	    Schema::dropIfExists('forem_inscription');
	}
}