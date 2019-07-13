<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Student
 * @package Syscover\Forem\Models
 */

class Trainer extends CoreModel
{
    protected $table        = 'forem_trainer';
    protected $fillable     = ['id', 'profile_id', 'academic_level_id', 'name', 'surname', 'surname2', 'gender_id', 'email', 'phone', 'mobile', 'birth_date', 'tin', 'availability', 'authorization', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude', 'specialty', 'is_register_jccm', 'categories', 'teacher_training', 'teacher_training', 'teaching_months', 'occupation_months', 'description'];
}
