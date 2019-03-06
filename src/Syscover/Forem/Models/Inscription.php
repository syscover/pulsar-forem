<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Inscription
 * @package Syscover\Forem\Models
 */

class Inscription extends CoreModel
{
    protected $table        = 'forem_inscription';
    protected $fillable     = ['id', 'name', 'surname', 'surname2', 'gender_id', 'birth_date', 'tin', 'ssn', 'email', 'phone', 'mobile', 'observations'];
}
