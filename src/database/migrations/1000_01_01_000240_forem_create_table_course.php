<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForemCreateTableCourse extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('forem_course'))
		{
			Schema::create('forem_course', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->integer('inscription_id')->unsigned()->nullable();
                
                // group
                $table->integer('group_id')->unsigned();
                $table->string('group_name')->nullable();

                // data student
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->string('surname2')->nullable(); 
                $table->string('gender')->nullable();
                $table->string('birth_date')->nullable();  
                $table->string('tin')->nullable();
                $table->string('ssn')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();
                $table->string('address')->nullable();
                $table->string('province')->nullable();
                $table->string('zip')->nullable();
                $table->string('locality')->nullable();

                // job
                $table->string('priority_collective')->nullable();                      // colectivo prioritario
                $table->string('collective')->nullable();                               // colectivo
                $table->string('employment_situation')->nullable();                     // situación laboral
                $table->string('academic_level')->nullable();                           // nivel academico
                $table->string('professional_category')->nullable();                    // categoría profesional
                $table->string('functional_area')->nullable();                          // área funcional

                // course
                $table->string('student_status')->nullable();                           // estado del alumno
                $table->string('evaluation')->nullable();                               // evaluación
                $table->string('practices')->nullable();                                // prácticas
                $table->string('practical_evaluation')->nullable();                     // evaluación de las prácticas
                $table->string('practical_hours')->nullable();  
                $table->string('starts_at')->nullable();
                $table->string('ends_at')->nullable();
                $table->string('hours')->nullable();                        // horas de prácticas

                // company
                $table->string('company_name')->nullable();
                $table->string('company_tin')->nullable();
                $table->string('company_kind_society')->nullable();                     // forma jurídica
                $table->string('company_pyme')->nullable();                             // es pyme
                $table->string('company_legal_holder')->nullable();                     // titular jurídico
                $table->string('company_person_holder')->nullable();                    // persona titular de la empresa
                $table->string('company_sector')->nullable();
                $table->string('company_trademark')->nullable();                        // nombre del centro de trabajo
                $table->string('company_document_type')->nullable();                    // tipo de documento de la empresa
                $table->string('company_ssn')->nullable();
                $table->string('company_province')->nullable();
                $table->string('company_locality')->nullable();
                

                // unemployment data
                // $table->string('unemployed_state')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('inscription_id', 'forem_course_inscription_id_fk')
                    ->references('id')
                    ->on('forem_inscription')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

                $table->foreign('group_id', 'forem_course_group_id_fk')
                    ->references('id')
                    ->on('forem_group')
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
	    Schema::dropIfExists('forem_course');
	}
}