<?php namespace Syscover\Forem\Services;

use Syscover\Admin\Traits\Attachable;
use Syscover\Forem\Models\Group;

class GroupService
{
    use Attachable;

    public static function create($object)
    {
        self::checkCreate($object);

        $group = Group::create(self::builder($object));

        // set attachments
        self::createAttachments(
            $object['attachments'],
            'storage/app/public/forem/groups',
            'storage/forem/groups',
            Group::class,
            $group->id,
            $group->lang_id
        );

        // we update record if has scout search engine, for register relations
        if (has_scout())
        {
            if($group->publish)
                $group->searchable();
            else
                $group->unsearchable();
        }

        return $group;
    }

    public static function update($object)
    {
        self::checkUpdate($object);
        Group::where('id', $object['id'])->update(self::builder($object));

        $group = Group::builder()->find($object['id']);

        // update attachments
        self::updateAttachments(
            $object['attachments'],
            'storage/app/public/forem/groups',
            'storage/forem/groups',
            Group::class,
            $group->id,
            $group->lang_id
        );

        if (has_scout())
        {
            if($group->publish)
                $group->searchable();
            else
                $group->unsearchable();
        }

        return  $group;
    }

    private static function builder($object, $filterKeys = null)
    {
        $object = collect($object);

        if($filterKeys)
        {
            $object = $object->only($filterKeys);
        }
        else
        {
            $object = $object->only([
                'code',
                'name',
                'slug',
                'category_id',
                'target_id',
                'assistance_id',
                'type_id',
                'hours',
                'price',
                'price_hour',
                'contents_excerpt',
                'contents',
                'requirements',
                'observations',
                'action_id',
                'expedient_id',
                'employment_office_id',
                'starts_at',
                'ends_at',
                'selection_date',
                'open',
                'schedule',
                'publish',
                'is_product',
                'product_id',
                'country_id',
                'territorial_area_1_id',
                'territorial_area_2_id',
                'territorial_area_3_id',
                'zip',
                'locality',
                'address',
                'latitude',
                'longitude'
            ]);
        }

        if($object->has('starts_at'))       $object['starts_at']        = date_time_string($object->get('starts_at'));
        if($object->has('ends_at'))         $object['ends_at']          = date_time_string($object->get('ends_at'));
        if($object->has('selection_date'))  $object['selection_date']   = date_time_string($object->get('selection_date'));

        return $object->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['code']))          throw new \Exception('You have to define a code field to create a group');
        if(empty($object['name']))          throw new \Exception('You have to define a name field to create a group');
        if(empty($object['slug']))          throw new \Exception('You have to define a slug field to create a group');
        if(empty($object['category_id']))   throw new \Exception('You have to define a category_id field to create a group');
        if(empty($object['target_id']))     throw new \Exception('You have to define a target_id field to create a group');
        if(empty($object['assistance_id'])) throw new \Exception('You have to define a assistance_id field to create a group');
        if(empty($object['type_id']))       throw new \Exception('You have to define a type_id field to create a group');
        if(empty($object['hours']))         throw new \Exception('You have to define a hours field to create a group');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))    throw new \Exception('You have to define a id field to update a group');
    }
}