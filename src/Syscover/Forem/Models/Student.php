<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Student
 * @package Syscover\Forem\Models
 */

class Student extends CoreModel
{
    protected $table        = 'forem_student';
    protected $fillable     = ['id', 'name', 'surname', 'surname2', 'gender_id', 'birth_date', 'tin', 'ssn', 'email', 'phone', 'mobile', 'observations'];
}
