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

				// inscription
				$table->increments('id');
                $table->integer('group_id')->unsigned();                                            // group that belong this inscription
                $table->integer('student_id')->unsigned()->nullable();                              // if is student registered
                $table->boolean('is_completed')->default(false);                                    // check if this inscription has completed to be exported to FOCO
                $table->boolean('is_exported')->default(false);                                     // check if this inscription have been exported to FOCO
                $table->boolean('is_coursed')->default(false);                                      // check if this inscription is in course
                $table->tinyInteger('reason_request_id')->unsigned()->nullable();                   // <id_motivo_solicitud></id_motivo_solicitud> :: pulsar-forem.reason_requests
                $table->string('other_reason_request')->nullable();                                 // <motivo_otros></motivo_otros>
                $table->text('observations')->nullable();

                // inscription process
                $table->integer('approved_user')->unsigned()->nullable();                           // user who approved this inscription
                $table->timestamp('approved_date')->nullable();                                     // date when was approved this inscription
                $table->boolean('approved')->default(false);                                        // check if this inscription is approved

                // FOCO
                $table->string('code')->nullable();                                                 // <expediente_grupo></expediente_grupo>
                $table->boolean('has_registry')->default(false);                                    // <tiene_registro_clm></tiene_registro_clm>
                $table->string('registry_number')->nullable();                                      // <num_registro_clm></num_registro_clm>
                $table->timestamp('registry_date')->nullable();                                     // <fecha_registro_clm></fecha_registro_clm>
                $table->tinyInteger('document_type_id')->unsigned()->nullable();                    // <id_tipo_documento_alumno></id_tipo_documento_alumno> :: pulsar-forem.document_types
                $table->string('document_number')->nullable();                                      // <numero_documento_alumno></numero_documento_alumno>

                // data student
                $table->string('name');                                                             // <nombre></nombre>
                $table->string('surname')->nullable();                                              // <primer_apellido></primer_apellido>
                $table->string('surname2')->nullable();                                             // <segundo_apellido></segundo_apellido>
                $table->tinyInteger('gender_id')->unsigned()->nullable();                           // <sexo></sexo> :: pulsar-forem.genders
                $table->date('birth_date')->nullable();                                             // <fecha_nacimiento></fecha_nacimiento>
                $table->string('tin')->nullable();                                                  // <nif></nif>
                $table->string('ssn')->nullable();
                $table->string('email')->nullable();                                                // <email></email>
                $table->string('phone')->nullable();                                                // <telefono></telefono>
                $table->string('mobile')->nullable();                                               // <movil></movil>
                $table->tinyInteger('address_type_id')->unsigned()->nullable();                     // <id_tipo_via></id_tipo_via> :: pulsar-forem.address_types
                $table->string('address')->nullable();                                              // <direccion></direccion>
                $table->integer('province_id')->unsigned()->nullable();                             // <id_provincia></id_provincia>
                $table->string('zip')->nullable();                                                  // <cod_postal></cod_postal>
                $table->integer('locality_id')->unsigned()->nullable();                             // <id_localidad></id_localidad>

                // agent
                $table->boolean('has_agent')->default(false);                                       // <actua_representante></actua_representante>
                $table->string('agent_name')->nullable();                                           // <nombre_representante></nombre_representante>
                $table->string('agent_surname')->nullable();                                        // <primer_apellido_representante></primer_apellido_representante>
                $table->string('agent_surname2')->nullable();                                       // <segundo_apellido_representante></segundo_apellido_representante>
                $table->string('agent_tin')->nullable();                                            // <num_documento_representante></num_documento_representante>
                $table->string('agent_address')->nullable();                                        // <domicilio_representante></domicilio_representante>
                $table->integer('agent_province_id')->unsigned()->nullable();                       // <provincia_representante></provincia_representante>
                $table->string('agent_zip')->nullable();                                            // <codigo_postal_representante></codigo_postal_representante>
                $table->integer('agent_locality_id')->unsigned()->nullable();                       // <localidad_representante></localidad_representante>
                $table->string('agent_email')->nullable();                                          // <email_representante></email_representante>
                $table->string('agent_phone')->nullable();                                          // <telefono_representante></telefono_representante>
                $table->string('agent_mobile')->nullable();                                         // <telefono_movil_representante></telefono_movil_representante>
                $table->string('agent_contact_schedule')->nullable();                               // <horario_pref_llamadas_representante></horario_pref_llamadas_representante>

                // knowledge
                $table->smallInteger('academic_level_id')->unsigned()->nullable();                  // <id_nivel_academico></id_nivel_academico> :: pulsar-forem.academic_levels
                $table->string('academic_level_specialty')->nullable();                             // <especialidad_nivel_academico></especialidad_nivel_academico>
                $table->boolean('has_other_course')->default(false);                                // <seleccionado_otro_curso></seleccionado_otro_curso>
                $table->string('other_course')->nullable();                                         // <otro_curso></otro_curso>
                $table->json('languages')->nullable();                                              // <lista_idiomas>
                $table->json('educations')->nullable();                                             // <lista_formaciones_profesionales>
                $table->json('experiences')->nullable();                                            // <lista_experiencias_profesionales>
                $table->boolean('has_driving_license')->default(false);                             // <tiene_carnet_conducir></tiene_carnet_conducir>
                $table->json('driving_licenses')->nullable();                                       // <lista_carnets_conducir></lista_carnets_conducir> :: pulsar-forem.driving_licenses

                // employment situation
                $table->smallInteger('employment_situation_id')->unsigned()->nullable();            // <id_situacion_laboral></id_situacion_laboral> :: pulsar-forem.employment_situations

                // unemployment data
                $table->date('unemployed_registration_date')->nullable();                           // <fecha_inscripcion></fecha_inscripcion>
                $table->tinyInteger('unemployed_situation_id')->unsigned()->nullable();             // <id_situacion_desempleo></id_situacion_desempleo> :: pulsar-forem.unemployed_situations
                $table->integer('employment_office_id')->unsigned()->nullable();                    // <id_oficina_empleo></id_oficina_empleo> :: forem_employment_office

                // employment data
                $table->tinyInteger('professional_category_id')->unsigned()->nullable();            // <id_categoria_profesional></id_categoria_profesional> :: pulsar-forem.professional_categories
                $table->tinyInteger('functional_area_id')->unsigned()->nullable();                  // <id_area_funcional></id_area_funcional> :: pulsar-forem.functional_areas
                $table->string('worker_code')->nullable();                                          // <codigo_ocupado></codigo_ocupado>

                // company
                $table->string('company_name')->nullable();                                         // <razon_social></razon_social>
                $table->string('company_tin')->nullable();                                          // <cif_empresa></cif_empresa>
                $table->string('company_sector')->nullable();                                       // <sector_comercio_centro_trabajo></sector_comercio_centro_trabajo>
                $table->integer('company_province_id')->unsigned()->nullable();                     // <id_provincia_centro_trabajo></id_provincia_centro_trabajo>
                $table->integer('company_locality_id')->unsigned()->nullable();                     // <id_localidad_centro_trabajo></id_localidad_centro_trabajo>
                $table->string('company_address')->nullable();                                      // <domicilio_centro_trabajo></domicilio_centro_trabajo>
                $table->string('company_zip')->nullable();                                          // <codigo_postal_centro_trabajo></codigo_postal_centro_trabajo>
                $table->boolean('is_big_company')->default(false);                                  // <chk_empresa_mas_250_trabajadores></chk_empresa_mas_250_trabajadores>

                // authorizations
                $table->boolean('has_ssn_authorization')->default(false);                           // <autorizacion_seg_social></autorizacion_seg_social>
                $table->boolean('has_certification_authorization')->default(false);                 // <autorizacion_titulacion></autorizacion_titulacion>
                $table->boolean('has_data_authorization')->default(false);                          // <autorizacion_datos></autorizacion_datos>
                $table->boolean('has_marketing_authorization')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('group_id', 'fk01_forem_inscription')
                    ->references('id')
                    ->on('forem_group')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('student_id', 'fk02_forem_inscription')
                    ->references('id')
                    ->on('forem_student')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
                $table->foreign('employment_office_id', 'fk03_forem_inscription')
                    ->references('id')
                    ->on('forem_employment_office')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('company_province_id', 'fk04_forem_inscription')
                    ->references('id')
                    ->on('forem_province')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('company_locality_id', 'fk05_forem_inscription')
                    ->references('code')
                    ->on('forem_locality')
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
