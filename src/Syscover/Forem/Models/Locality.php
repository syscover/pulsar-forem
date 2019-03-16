<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Locality
 * @package Syscover\Forem\Models
 */

class Locality extends CoreModel
{
    protected $table        = 'forem_locality';
    protected $fillable     = ['id', 'code', 'province_id', 'name'];
    public $with            = ['province'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
