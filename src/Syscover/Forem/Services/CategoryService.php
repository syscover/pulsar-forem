<?php namespace Syscover\Forem\Services;

use Syscover\Forem\Models\Category;

class CategoryService
{
    public static function create($object)
    {
        self::checkCreate($object);
        return Category::create(self::builder($object));
    }

    public static function update($object)
    {
        self::checkUpdate($object);
        Category::where('id', $object['id'])->update(self::builder($object));

        return  Category::builder()->find($object['id']);
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
                'name',
                'slug'
            ]);
        }

        return $object->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['name']))  throw new \Exception('You have to define a name field to create a category');
        if(empty($object['slug']))  throw new \Exception('You have to define a slug field to create a category');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))    throw new \Exception('You have to define a id field to update a category');
    }
}