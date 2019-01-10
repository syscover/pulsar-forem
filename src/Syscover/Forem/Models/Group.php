<?php namespace Syscover\Forem\Models;

use Syscover\Admin\Models\Attachment;
use Syscover\Core\Models\CoreModel;
use Syscover\Market\Traits\Marketable;

/**
 * Class Group
 * @package Syscover\Forem\Models
 */

class Group extends CoreModel
{
    use Marketable;

    protected $table        = 'forem_group';
    protected $fillable     = ['id', 'code', 'name', 'slug', 'category_id', 'target_id', 'assistance_id', 'type_id', 'hours', 'price', 'price_hour', 'contents', 'requirements', 'observations', 'action_id', 'expedient_id', 'employment_office_id', 'starts_at', 'ends_at', 'selection_date', 'open', 'schedule', 'publish', 'is_product', 'product_id', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude'];

    /**
     * Is not possible add 'attachments' to $with parameter, it need to be instantiated to get lang parameter
     * It's possible pass lang parameter with this method
     *
     * Product::with(['attachments' => function ($q) use ($langId) {
     *   $q->where('admin_attachment.lang_id', $langId);
     * }])->get();
     */
    public function attachments()
    {
        return $this->morphMany(
            Attachment::class,
            'object',
            'object_type',
            'object_id',
            'id'
        )
            ->orderBy('sort', 'asc');
    }
}