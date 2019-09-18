<?php namespace Syscover\Forem\GraphQL\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Group;
use Syscover\Forem\Models\Inscription;
use Syscover\Forem\Services\InscriptionService;
use Spatie\ArrayToXml\ArrayToXml;

class InscriptionGraphQLService extends CoreGraphQLService
{
    public function __construct(Inscription $model, InscriptionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function checkTin($root, array $args)
    {
        $inscription = Inscription::where('group_id', $args['groupId'])
                ->where('tin', $args['tin'])
                ->where('is_completed', true)
                ->first();

        return $inscription ? true : false;
    }

    public function export($root, array $args)
    {
        $group          = Group::find($args['id']);
        $inscriptions   = Inscription::where('group_id', $args['id'])
            ->where('is_exported', false)
            ->where('is_completed', true)
            ->get();

        if ($inscriptions->count() === 0) return null;

        // group inscriptions each 10
        $inscriptionGroups = $inscriptions->chunk(10);

        $files = [];
        foreach ($inscriptionGroups as $inscriptionGroup)
        {
            // init array
            $inscriptionsList = [];
            foreach ($inscriptionGroup as $inscription)
            {
                $dataInscription = [];

                $dataInscription['expediente_grupo'] = $inscription->code;
                $dataInscription['tiene_registro_clm'] = $inscription->has_registry ? 1 : 0;

                if ($inscription->has_registry) {
                    $dataInscription['num_registro_clm'] = $inscription->registry_number;
                    $dataInscription['fecha_registro_clm'] = Carbon::parse($inscription->registry_date)->format('d/m/Y');
                }

                $dataInscription['alumno']['nif'] = $inscription->tin;
                $dataInscription['alumno']['nombre'] = $inscription->name;
                $dataInscription['alumno']['primer_apellido'] = $inscription->surname;
                $dataInscription['alumno']['segundo_apellido'] = $inscription->surname2;
                $dataInscription['alumno']['fecha_nacimiento'] = Carbon::parse($inscription->birth_date)->format('d/m/Y');
                $dataInscription['alumno']['id_tipo_documento_alumno'] = $inscription->document_type_id;
                $dataInscription['alumno']['numero_documento_alumno'] = $inscription->document_number;
                $dataInscription['alumno']['telefono'] = $inscription->phone;
                $dataInscription['alumno']['movil'] = $inscription->mobile;
                $dataInscription['alumno']['sexo'] = $inscription->gender_id;
                $dataInscription['alumno']['id_tipo_via'] = $inscription->address_type_id;
                $dataInscription['alumno']['cod_postal'] = $inscription->zip;
                $dataInscription['alumno']['direccion'] = $inscription->address;
                $dataInscription['alumno']['id_provincia'] = $inscription->province_id;
                $dataInscription['alumno']['id_localidad'] = $inscription->locality_id;
                $dataInscription['alumno']['tiene_carnet_conducir'] = $inscription->has_driving_license ? 1 : 0;
                $dataInscription['alumno']['id_situacion_laboral'] = $inscription->employment_situation_id;

                if ($inscription->employment_situation_id === 0) {
                    $dataInscription['alumno']['datos_desempleado']['fecha_inscripcion'] = Carbon::parse($inscription->unemployed_registration_date)->format('d/m/Y');
                    $dataInscription['alumno']['datos_desempleado']['id_oficina_empleo'] = $inscription->employment_office_id;
                    $dataInscription['alumno']['datos_desempleado']['id_situacion_desempleo'] = $inscription->unemployed_situation_id;
                }
                else {
                    $dataInscription['alumno']['datos_ocupado']['id_categoria_profesional'] = $inscription->professional_category_id;
                    $dataInscription['alumno']['datos_ocupado']['id_area_funcional'] = $inscription->functional_area_id;
                    $dataInscription['alumno']['datos_ocupado']['codigo_ocupado'] = $inscription->worker_code;
                    $dataInscription['alumno']['datos_ocupado']['cif_empresa'] = $inscription->company_tin;
                    $dataInscription['alumno']['datos_ocupado']['razon_social'] = $inscription->company_name;
                    $dataInscription['alumno']['datos_ocupado']['sector_comercio_centro_trabajo'] = $inscription->company_sector;
                    $dataInscription['alumno']['datos_ocupado']['id_provincia_centro_trabajo'] = $inscription->company_province_id;
                    $dataInscription['alumno']['datos_ocupado']['id_localidad_centro_trabajo'] = $inscription->company_locality_id;
                    $dataInscription['alumno']['datos_ocupado']['chk_empresa_mas_250_trabajadores'] = $inscription->is_big_company ? 1 : 0;
                    $dataInscription['alumno']['datos_ocupado']['domicilio_centro_trabajo'] = $inscription->company_address;
                    $dataInscription['alumno']['datos_ocupado']['codigo_postal_centro_trabajo'] = $inscription->company_zip;
                }

                $dataInscription['alumno']['id_nivel_academico'] = $inscription->academic_level_id;

                if ($inscription->academic_level_id && collect(config('pulsar-forem.academic_levels'))->where('id', $inscription->academic_level_id)->first()->specialty)
                {
                    $dataInscription['alumno']['especialidad_nivel_academico'] = $inscription->academic_level_specialty;
                }

                $dataInscription['alumno']['seleccionado_otro_curso'] = $inscription->has_other_course ? 1 : 0;

                if ($inscription->has_other_course)
                {
                    $dataInscription['alumno']['otro_curso'] = $inscription->other_course;
                }

                $dataInscription['alumno']['id_motivo_solicitud'] = $inscription->reason_request_id;

                if ($inscription->reason_request_id === 6)
                {
                    $dataInscription['alumno']['motivo_otros'] = $inscription->other_reason_request;
                }

                $dataInscription['alumno']['autorizacion_seg_social'] = $inscription->has_ssn_authorization ? 1 : 0;
                $dataInscription['alumno']['autorizacion_titulacion'] = $inscription->has_certification_authorization ? 1 : 0;
                $dataInscription['alumno']['autorizacion_datos'] = $inscription->has_data_authorization ? 1 : 0;

                $dataInscription['actua_representante'] = $inscription->has_agent ? 1 : 0;

                if ($inscription->has_agent)
                {
                    $dataInscription['representante']['num_documento_representante'] = $inscription->agent_tin;
                    $dataInscription['representante']['nombre_representante'] = $inscription->agent_name;
                    $dataInscription['representante']['primer_apellido_representante'] = $inscription->agent_surname;
                    $dataInscription['representante']['segundo_apellido_representante'] = $inscription->agent_surname2;
                    $dataInscription['representante']['domicilio_representante'] = $inscription->agent_address;
                    $dataInscription['representante']['localidad_representante'] = $inscription->agent_locality_id;
                    $dataInscription['representante']['provincia_representante'] = $inscription->agent_province_id;
                    $dataInscription['representante']['codigo_postal_representante'] = $inscription->agent_zip;
                    $dataInscription['representante']['telefono_representante'] = $inscription->agent_phone;
                    $dataInscription['representante']['telefono_movil_representante'] = $inscription->agent_mobile;
                    $dataInscription['representante']['horario_pref_llamadas_representante'] = $inscription->agent_contact_schedule;
                    $dataInscription['representante']['email_representante'] = $inscription->agent_email;
                }

                // languages
                $languagesData = [];
                if (is_array($inscription->languages))
                {
                    foreach ($inscription->languages as $language)
                    {
                        $languageData = [];
                        $languageData['idioma']['id_idioma'] = $language['lang']['id'];
                        $languageData['idioma']['titulacion_idioma'] = $language['certificate']['id'];
                        $languageData['idioma']['destreza_hablar_idioma'] = $language['speaking_skill']['id'];
                        $languageData['idioma']['destreza_escribir_idioma'] = $language['writing_skill']['id'];
                        $languageData['idioma']['destreza_comprender_idioma'] = $language['listening_skill']['id'];

                        if ($language['lang']['id'] === 6) $languageData['idioma']['descripcion_idioma'] = $language['other'];

                        $languagesData[] = $languageData;
                    }
                }

                $dataInscription['lista_idiomas'] = $languagesData;

                // educations
                $educationsData = [];
                if (is_array($inscription->educations))
                {
                    foreach ($inscription->educations as $education)
                    {
                        $educationData = [];
                        $educationData['formacion_profesional']['denominacion_curso'] = $education['name'];
                        $educationData['formacion_profesional']['centro'] = $education['academic'];
                        $educationData['formacion_profesional']['anio'] = $education['year'];
                        $educationData['formacion_profesional']['duracion'] = $education['duration'];

                        $educationsData[] = $educationData;
                    }
                }
                $dataInscription['lista_formaciones_profesionales'] = $educationsData;

                // experiences
                $experiencesData = [];
                if (is_array($inscription->experiences))
                {
                    foreach ($inscription->experiences as $experience)
                    {
                        $experienceData = [];
                        $experienceData['experiencia_profesional']['id_categoria_profesional'] = $experience['professional_category']['id'];
                        $experienceData['experiencia_profesional']['cod_duracion'] = $experience['duration']['id'];
                        $experienceData['experiencia_profesional']['empresa'] = $experience['company'];
                        $experienceData['experiencia_profesional']['funciones'] = $experience['role'];
                        $experienceData['experiencia_profesional']['id_sector'] = $experience['sector']['id'];

                        $experiencesData[] = $experienceData;
                    }
                }
                $dataInscription['lista_experiencias_profesionales'] = $experiencesData;

                $driveLicensesData = [];
                if (is_array($inscription->driving_licenses))
                {
                    foreach ($inscription->driving_licenses as $drivingLicense)
                    {
                        $driveLicenseData = [];
                        $driveLicenseData['carnet_conducir']['id_carnet_conducir'] = $drivingLicense;

                        $driveLicensesData[] = $driveLicenseData;
                    }

                }
                $dataInscription['lista_carnets_conducir'] = $driveLicensesData;

                // export data
                $inscriptionsList[] = $dataInscription;
            }
            $export = [
                'lista_solicitudes_inscripcion' => ['solicitud_inscripcion' => $inscriptionsList]
            ];

            $xml = ArrayToXml::convert($export, ['rootElementName' => 'documento']);

            $filename = $group->id . '--' . Str::uuid() . '.xml';
            $files[] = $filename;
            Storage::disk('local')->put('public/forem/export/' . $filename, $xml);
        }


        // Create zip file
        $filename = $group->id . '--' . Str::uuid() . '.zip';
        $pathname = 'app/public/forem/export/' . $filename;
        $absoluteRoute = storage_path($pathname);

        $zip = new \ZipArchive();

        if ($zip->open($absoluteRoute, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true)
        {
            foreach ($files as $file)
            {
                if (file_exists(storage_path('app/public/forem/export/' . $file)))
                {
                    info(storage_path('app/public/forem/export/' . $file));
                    $zip->addFile(storage_path('app/public/forem/export/' . $file), $file);
                }
            }
            $zip->close();
        }

        // set like exported
        Inscription::whereIn('id', $inscriptions->pluck('id'))->update([
            'is_exported' => true
        ]);

        // delete xml files
        foreach ($files as $file) {
            Storage::disk('local')->delete('public/forem/export/' . $file);
        }

        return [
            'url'       => asset('storage/forem/export/' . $filename),
            'filename'  => $filename,
            'pathname'  => $pathname,
            'mime'      => mime_content_type($absoluteRoute),
            'size'      => filesize($absoluteRoute)
        ];
    }
}
