<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Action
 * @package Syscover\Forem\Models
 */

class Action extends CoreModel
{
    protected $table        = 'forem_action';
    protected $fillable     = ['id', 'code', 'name', 'slug', 'category_id', 'target_id', 'assistance_id', 'type_id', 'hours', 'price', 'price_hour', 'contents_excerpt', 'contents', 'requirements', 'observations'];
}