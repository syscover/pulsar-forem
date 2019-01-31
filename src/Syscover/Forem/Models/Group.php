<?php namespace Syscover\Forem\Models;

use Laravel\Scout\Searchable;
use Carbon\Carbon;
use Syscover\Admin\Models\Attachment;
use Syscover\Admin\Models\Profile;
use Syscover\Admin\Traits\Geolocalizable;
use Syscover\Core\Models\CoreModel;
use Syscover\Market\Traits\Marketable;

/**
 * Class Group
 * @package Syscover\Forem\Models
 */

class Group extends CoreModel
{
    use Marketable, Searchable;
    use Geolocalizable;

    protected $table        = 'forem_group';
    protected $fillable     = ['id', 'profile_id', 'prefix_id', 'code', 'name', 'slug', 'category_id', 'target_id', 'assistance_id', 'type_id', 'certificate', 'certificate_code', 'hours', 'subsidized_amount', 'price', 'price_hour', 'contents_excerpt', 'contents', 'requirements', 'observations', 'action_id', 'expedient_id', 'starts_at', 'ends_at', 'selection_date', 'open', 'featured', 'schedule', 'publish', 'is_product', 'product_id', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude'];
    public $with            = [
        'category',
        'profile',
        'territorial_area_2'
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

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
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
        $searchable = [
            'id'                    => $this->id,
            'code'                  => $this->code,
            'name'                  => $this->name,
            'slug'                  => $this->slug,
            'category'              => $this->category ? [
                'id'    => $this->category->id,
                'name'  => $this->category->name
            ] : null,
            'certificate_code'      => $this->certificate_code,
            'contents_excerpt'      => $this->contents_excerpt,
            'contents'              => $this->contents,
            'assistance_id'         => $this->assistance_id,
            'territorial_area_2'    => $this->territorial_area_2 ? [
                'id'    => $this->territorial_area_2->id,
                'name'  => $this->territorial_area_2->name
            ] : null,
            'attachments'           => $this->attachments->map(function ($item, $key) {
                $item['data'] = collect($item['data']);
                return $item->only(['ix', 'id', 'lang_id', 'family_id', 'sort', 'alt', 'title', 'base_path', 'file_name', 'url', 'mime', 'extension', 'size', 'width', 'height', 'data', 'family']);
            })
        ];

        return $searchable;
    }
}
