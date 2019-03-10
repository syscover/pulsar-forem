<?php namespace Syscover\Forem\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Forem\Models\Province;

class ProvinceService
{
    public function store(array $data)
    {
        $this->validate($data, [
            'code'  => 'numeric',
            'name'  => 'required|between:2,255'
        ]);

        return Province::create($data);
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'    => 'numeric',
            'code'  => 'numeric',
            'name'  => 'required|between:2,255'
        ]);

        $object = Province::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}
