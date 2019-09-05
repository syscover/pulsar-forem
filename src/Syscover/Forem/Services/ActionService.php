<?php namespace Syscover\Forem\Services;

use Syscover\Forem\Models\Action;

class ActionService
{
    public static function create($object)
    {
        self::checkCreate($object);
        return Action::create(self::builder($object));
    }

    public static function update($object)
    {
        self::checkUpdate($object);
        Action::where('id', $object['id'])->update(self::builder($object));

        return  Action::builder()->find($object['id']);
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
                'certificate',
                'certificate_code',
                'hours',
                'price_total',
                'price_hour',
                'contents_excerpt',
                'contents',
                'requirements',
                'observations'
            ]);
        }

        return $object->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['name']))          throw new \Exception('You have to define a name field to create a action');
        if(empty($object['slug']))          throw new \Exception('You have to define a slug field to create a action');
        if(empty($object['category_id']))   throw new \Exception('You have to define a category_id field to create a action');
        if(empty($object['target_id']))     throw new \Exception('You have to define a target_id field to create a action');
        if(empty($object['assistance_id'])) throw new \Exception('You have to define a assistance_id field to create a action');
        if(empty($object['type_id']))       throw new \Exception('You have to define a type_id field to create a action');
        if(empty($object['hours']))         throw new \Exception('You have to define a hours field to create a action');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))    throw new \Exception('You have to define a id field to update a action');
    }
}
