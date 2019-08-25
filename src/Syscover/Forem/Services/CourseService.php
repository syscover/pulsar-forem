<?php namespace Syscover\Forem\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Forem\Models\Inscription;
use Syscover\Forem\Models\Student;

class CourseService extends Service
{
    public function store(array $data)
    {
        $this->validate($data, [
            'group_id' => 'required|integer'
        ]);

        return Inscription::create($data);
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'                => 'required|integer',
            'group_id'          => 'required|integer'
        ]);

        $object = Inscription::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}
