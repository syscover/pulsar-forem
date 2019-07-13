<?php namespace Syscover\Forem\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Forem\Models\Locality;

class LocalityService extends Service
{
    public function store(array $data)
    {
        $this->validate($data, [
            'province_id'   => 'required|integer',
            'code'          => 'required|integer',
            'name'          => 'required|between:2,255'
        ]);

        return Locality::create($data);
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'            => 'integer',
            'province_id'   => 'required|integer',
            'code'          => 'required|integer',
            'name'          => 'required|between:2,255'
        ]);

        $object = Locality::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}
