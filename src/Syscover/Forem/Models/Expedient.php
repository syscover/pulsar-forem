<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Expedient
 * @package Syscover\Forem\Models
 */

class Expedient extends CoreModel
{
    protected $table        = 'forem_expedient';
    protected $fillable     = ['id', 'modality_id', 'ambit', 'year', 'code', 'name', 'starts_at', 'ends_at'];
}
