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
                $table->integer('student_id')->unsigned()->nullable();                              // if is student registered
                $table->string('name');                                                             // <nombre></nombre>
                $table->string('surname')->nullable();                                              // <primer_apellido></primer_apellido>
                $table->string('surname2')->nullable();                                             // <segundo_apellido></segundo_apellido>
                $table->tinyInteger('gender_id')->unsigned()->nullable();                           // <sexo></sexo>
                $table->date('birth_date')->nullable();                                             // <fecha_nacimiento></fecha_nacimiento>
                $table->string('tin')->nullable();                                                  // <nif></nif>
                $table->string('ssn')->nullable();
                $table->string('email')->nullable();                                                // <email></email>
                $table->string('phone')->nullable();                                                // <telefono></telefono>
                $table->string('mobile')->nullable();                                               // <movil></movil>

                // FOCO
                $table->string('code')->nullable();                                                 // <expediente_grupo></expediente_grupo>
                $table->boolean('has_registry')->default(false);                              // <tiene_registro_clm></tiene_registro_clm>
                $table->string('registry_number')->nullable();                                      // <num_registro_clm></num_registro_clm>
                $table->timestamp('registry_date')->nullable();                                     // <fecha_registro_clm></fecha_registro_clm>
                $table->tinyInteger('document_type_id')->unsigned()->nullable();                    // <id_tipo_documento_alumno></id_tipo_documento_alumno>
                $table->string('document_number')->nullable();                                      // <numero_documento_alumno></numero_documento_alumno>
                $table->tinyInteger('road_type_id')->unsigned()->nullable();                        // <id_tipo_via></id_tipo_via>
                $table->string('zip')->nullable();                                                  // <cod_postal></cod_postal>
                $table->string('address')->nullable();                                              // <direccion></direccion>

                $table->boolean('has_driving_license')->default(false);                       // <tiene_carnet_conducir></tiene_carnet_conducir>
                $table->json('driving_licenses')->nullable();                                       // <id_carnet_conducir></id_carnet_conducir>

                $table->smallInteger('employment_situation_id')->unsigned()->nullable();            // <id_situacion_laboral></id_situacion_laboral>

                // datos desempleo
                $table->timestamp('registration_date')->default(DB::raw('CURRENT_TIMESTAMP'));      // <fecha_inscripcion></fecha_inscripcion>
                $table->integer('employment_office_id')->unsigned()->nullable();                    // <id_oficina_empleo></id_oficina_empleo>
                $table->tinyInteger('unemployed_situation_id')->unsigned()->nullable();             // <id_situacion_desempleo></id_situacion_desempleo>

                // datos ocupado
                $table->tinyInteger('professional_category_id')->unsigned()->nullable();            // <id_categoria_profesional></id_categoria_profesional>
                $table->tinyInteger('functional_area_id')->unsigned()->nullable();                  // <functional_area_id></functional_area_id>
                $table->string('worker_code')->nullable();                                          // <codigo_ocupado></codigo_ocupado>
                $table->string('company')->nullable();                                              // <razon_social></razon_social>
                $table->string('tin')->nullable();                                                  // <cif_empresa></cif_empresa>
                $table->string('workplace')->nullable();                                            // <sector_comercio_centro_trabajo></sector_comercio_centro_trabajo>
                $table->boolean('is_big_company')->default(false);                            // <chk_empresa_mas_250_trabajadores></chk_empresa_mas_250_trabajadores>
                $table->string('workplace_address')->nullable();                                    // <domicilio_centro_trabajo></domicilio_centro_trabajo>
                $table->string('workplace_zip')->nullable();                                        // <codigo_postal_centro_trabajo></codigo_postal_centro_trabajo>

                $table->smallInteger('academic_level_id')->unsigned()->nullable();                  // <id_nivel_academico></id_nivel_academico>
                $table->string('academic_level_specialty')->nullable();                             // <especialidad_nivel_academico></especialidad_nivel_academico>
                $table->boolean('has_other_course')->default(false);                          // <seleccionado_otro_curso></seleccionado_otro_curso>
                $table->string('other_course')->nullable();                                         // <otro_curso></otro_curso>
                $table->tinyInteger('reason_request_id')->unsigned()->nullable();                   // <id_motivo_solicitud></id_motivo_solicitud>
                $table->string('other_reason_request')->nullable();                                 // <motivo_otros></motivo_otros>
                $table->boolean('ssn_authorization')->default(false)->nullable();;            // <autorizacion_seg_social></autorizacion_seg_social>
                $table->boolean('certification_authorization')->default(false)->nullable();   // <autorizacion_titulacion></autorizacion_titulacion>
                $table->boolean('data_authorization')->default(false)->nullable();            // <autorizacion_datos></autorizacion_datos>>













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