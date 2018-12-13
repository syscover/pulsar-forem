<?php namespace Syscover\Forem\Models;

use Syscover\Admin\Traits\Geolocalizable;
use Syscover\Core\Models\CoreModel;

/**
 * Class EmploymentOffice
 * @package Syscover\Forem\Models
 */

class EmploymentOffice extends CoreModel
{
    use Geolocalizable;

    protected $table        = 'forem_employment_office';
    protected $fillable     = ['id', 'profile_id', 'cod', 'name', 'slug', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude'];

    public function scopeBuilder($query)
    {
        return $query;
    }
}