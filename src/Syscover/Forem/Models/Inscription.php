<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Inscription
 * @package Syscover\Forem\Models
 */

class Inscription extends CoreModel
{
    protected $table        = 'forem_inscription';
    protected $fillable     = [
        // inscription
        'id',
        'group_id',
        'student_id',
        'is_completed',
        'is_exported',
        'reason_request_id',
        'other_reason_request',
        'observations',

        // inscription process
        'approved_user',
        'approved_date',
        'approved',

        // data student
        'name',
        'surname',
        'surname2',
        'gender_id',
        'birth_date',
        'tin',
        'ssn',
        'email',
        'phone',
        'mobile',
        'address_type_id',
        'address',
        'province_id',
        'zip',
        'locality_id',

        // agent
        'has_agent',
        'agent_tin',
        'agent_name',
        'agent_surname',
        'agent_surname2',
        'agent_address',
        'agent_province_id',
        'agent_locality_id',
        'agent_zip',
        'agent_email',
        'agent_phone',
        'agent_mobile',
        'agent_contact_schedule',

        // knowledge
        'academic_level_id',
        'academic_level_specialty',
        'has_other_course',
        'other_course',
        'languages',
        'educations',
        'experiences',
        'has_driving_license',
        'driving_licenses',

        // FOCO
        'code',
        'has_registry',
        'registry_number',
        'registry_date',
        'document_type_id',
        'document_number',

        // employment situation
        'employment_situation_id',

        // unemployment data
        'unemployed_registration_date',
        'unemployed_situation_id',
        'employment_office_id',

        // employment data
        'professional_category_id',
        'functional_area_id',
        'worker_code',

        // company
        'company_name',
        'company_tin',
        'company_sector',
        'company_province_id',
        'company_locality_id',
        'company_address',
        'company_zip',
        'is_big_company',

        // authorizations
        'has_ssn_authorization',
        'has_certification_authorization',
        'has_data_authorization',
        'has_marketing_authorization'
    ];
    public $with = [
        'group'
    ];
    protected $casts        = [
        'driving_licenses'  => 'array',
        'languages'         => 'array',
        'experiences'       => 'array',
        'educations'        => 'array'
    ];

    public function scopeBuilder($query)
    {
        return $query
            ->join('forem_group', 'forem_inscription.group_id', '=', 'forem_group.id')
            ->addSelect('forem_group.*', 'forem_inscription.*', 'forem_group.name as forem_group_name', 'forem_inscription.name as forem_inscription_name');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
