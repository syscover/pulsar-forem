<?php namespace Syscover\Forem\Models;

use Syscover\Admin\Models\Profile;
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
    protected $fillable     = ['id', 'profile_id', 'code', 'name', 'slug', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude'];
    public $with            = ['profile'];

    public function scopeBuilder($query)
    {
        return $query->leftJoin('admin_profile', 'forem_employment_office.profile_id', '=', 'admin_profile.id')
            ->addSelect('admin_profile.*', 'forem_employment_office.*', 'admin_profile.name as admin_profile_name', 'forem_employment_office.name as forem_employment_office_name');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}