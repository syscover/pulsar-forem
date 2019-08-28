<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Student
 * @package Syscover\Forem\Models
 */

class Trainer extends CoreModel
{
    protected $table        = 'forem_trainer';
    protected $fillable     = ['id', 'profile_id', 'academic_level_id', 'name', 'surname', 'surname2', 'gender_id', 'birth_date', 'email', 'phone', 'mobile', 'tin', 'availabilities', 'has_communication', 'has_authorization', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude', 'specialty', 'is_register_jccm', 'categories', 'teacher_training', 'teacher_training', 'teaching_months', 'occupation_months', 'description'];
    public $with            = ['profile'];
    protected $casts        = [
        'availabilities'    => 'array',
        'categories'        => 'array'
    ];

    public function scopeBuilder($query)
    {
        return $query
            ->join('forem_profile', 'forem_trainer.profile_id', '=', 'forem_profile.id')
            ->addSelect('forem_profile.*', 'forem_trainer.*', 'forem_profile.name as forem_profile_name', 'forem_trainer.name as forem_trainer_name');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
