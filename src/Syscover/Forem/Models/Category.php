<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Category
 * @package Syscover\Forem\Models
 */

class Category extends CoreModel
{
    protected $table        = 'forem_category';
    protected $fillable     = ['id', 'name', 'slug'];
}