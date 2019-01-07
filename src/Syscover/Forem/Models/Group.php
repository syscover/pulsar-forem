<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Group
 * @package Syscover\Forem\Models
 */

class Group extends CoreModel
{
    protected $table        = 'forem_group';
    protected $fillable     = ['id', 'code', 'name', 'slug', 'category_id', 'target_id', 'assistance_id', 'type_id', 'hours', 'online', 'subsidized', 'price', 'price_hour', 'contents', 'requirements', 'observations', 'action_id', 'expedient_id', 'employment_office_id', 'starts_at', 'ends_at', 'selection_date', 'open', 'schedule', 'publish', 'is_product', 'product_id', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude'];
}