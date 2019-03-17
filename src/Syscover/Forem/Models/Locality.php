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

    public function scopeBuilder($query)
    {
        return $query
            ->leftJoin('forem_province', 'forem_locality.province_id', '=', 'forem_province.id')
            ->addSelect('forem_province.*', 'forem_locality.*', 'forem_province.name as forem_province_name', 'forem_locality.name as forem_locality_name');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
