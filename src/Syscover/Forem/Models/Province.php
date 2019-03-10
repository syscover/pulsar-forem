<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Province
 * @package Syscover\Forem\Models
 */

class Province extends CoreModel
{
    protected $table        = 'forem_province';
    protected $fillable     = ['id', 'code', 'name'];
}
