<?php namespace Syscover\Forem\Services;

use Syscover\Forem\Models\EmploymentOffice;

class EmploymentOfficeService
{
    public static function create($object)
    {
        self::checkCreate($object);
        return EmploymentOffice::create(self::builder($object));
    }

    public static function update($object)
    {
        self::checkUpdate($object);
        EmploymentOffice::where('id', $object['id'])->update(self::builder($object));

        return  EmploymentOffice::builder()->find($object['id']);
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
                'profile_id',
                'code',
                'name',
                'slug',
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

        return $object->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['code']))  throw new \Exception('You have to define a code field to create a employment office');
        if(empty($object['name']))  throw new \Exception('You have to define a name field to create a employment office');
        if(empty($object['slug']))  throw new \Exception('You have to define a slug field to create a employment office');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))    throw new \Exception('You have to define a id field to update a employment office');
    }
}