<?php namespace Syscover\Forem\Services;

use Syscover\Forem\Models\Expedient;

class ExpedientService
{
    public static function create($object)
    {
        self::checkCreate($object);
        return Expedient::create(self::builder($object));
    }

    public static function update($object)
    {
        self::checkUpdate($object);
        Expedient::where('id', $object['id'])->update(self::builder($object));

        return  Expedient::builder()->find($object['id']);
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
                'modality_id',
                'year',
                'name',
                'starts_at',
                'ends_at'
            ]);
        }

        if($object->has('starts_at'))   $object['starts_at']    = date_time_string($object->get('starts_at'));
        if($object->has('ends_at'))     $object['ends_at']      = date_time_string($object->get('ends_at'));

        return $object->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['code']))  throw new \Exception('You have to define a code field to create a expedient');
        if(empty($object['name']))  throw new \Exception('You have to define a name field to create a expedient');
        if(empty($object['year']))  throw new \Exception('You have to define a year field to create a expedient');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))    throw new \Exception('You have to define a id field to update a expedient');
    }
}