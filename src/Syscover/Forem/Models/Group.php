<?php namespace Syscover\Forem\Models;

use Laravel\Scout\Searchable;
use Carbon\Carbon;
use Syscover\Admin\Models\Attachment;
use Syscover\Core\Models\CoreModel;
use Syscover\Market\Traits\Marketable;

/**
 * Class Group
 * @package Syscover\Forem\Models
 */

class Group extends CoreModel
{
    use Marketable, Searchable;

    protected $table        = 'forem_group';
    protected $fillable     = ['id', 'code', 'name', 'slug', 'category_id', 'target_id', 'assistance_id', 'type_id', 'hours', 'price', 'price_hour', 'contents_excerpt', 'contents', 'requirements', 'observations', 'action_id', 'expedient_id', 'employment_office_id', 'starts_at', 'ends_at', 'selection_date', 'open', 'schedule', 'publish', 'is_product', 'product_id', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude'];
    public $with            = [
        'category'
    ];
    protected $casts        = [
        'price' => 'float'
    ];

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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

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

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $searchable =  [
            'id'                => $this->id,
            'code'              => $this->code,
            'name'              => $this->name,
            'category'          => $this->category->name,
            'contents_excerpt'  => $this->contents_excerpt,
            'contents'          => $this->contents,
            'attachments'       => $this->attachments->map(function ($item, $key) {
                $item['data'] = collect($item['data']);
                return $item->only(['ix', 'id', 'lang_id', 'family_id', 'sort', 'alt', 'title', 'base_path', 'file_name', 'url', 'mime', 'extension', 'size', 'width', 'height', 'data', 'family']);
            })
        ];

        return $searchable;
    }
}