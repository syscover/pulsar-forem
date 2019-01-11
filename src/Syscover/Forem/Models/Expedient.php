<?php namespace Syscover\Forem\Models;

use Carbon\Carbon;
use Syscover\Core\Models\CoreModel;

/**
 * Class Expedient
 * @package Syscover\Forem\Models
 */

class Expedient extends CoreModel
{
    protected $table        = 'forem_expedient';
    protected $fillable     = ['id', 'modality_id', 'year', 'name', 'starts_at', 'ends_at'];

    // Accessors
    public function getStartsAtAttribute($value)
    {
        // https://es.wikipedia.org/wiki/ISO_8601
        // return (new Carbon($value))->toW3cString();
        return $value ? (new Carbon($value))->format('Y-m-d\TH:i:s') : null;
    }

    public function getEndsAtAttribute($value)
    {
        // https://es.wikipedia.org/wiki/ISO_8601
        // return (new Carbon($value))->toW3cString();
        return $value ? (new Carbon($value))->format('Y-m-d\TH:i:s') : null;
    }
}