<?php namespace Syscover\Forem\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Course
 * @package Syscover\Forem\Models
 */

class Course extends CoreModel
{
    protected $table        = 'forem_course';
    protected $fillable     = [
        'id',

        // inscription
        'inscription_id',
        
        // group
        'group_id',
        'group_name',
        'group_starts_at',
        'group_ends_at',

        // data student
        'name',
        'surname',
        'surname2',
        'gender',
        'birth_date',
        'tin',
        'ssn',
        'email',
        'phone',
        'mobile',
        'address',
        'province',
        'zip',
        'locality'
    ];
    public $with = [
        'group'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function inscription()
    {
        return $this->belongsTo(Inscription::class, 'inscription_id');
    }
}
