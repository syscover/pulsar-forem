<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Profile
 * @package Syscover\Forem\Models
 */

class Profile extends CoreModel
{
    protected $table        = 'forem_profile';
    protected $fillable     = ['id', 'name', 'publish'];
}
