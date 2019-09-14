<?php namespace Syscover\Forem\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Admin\Traits\Attachable;
use Syscover\Forem\Models\Trainer;

class TrainerService extends Service
{
    use Attachable;

    public function store(array $data)
    {
        $this->validate($data, [
            'name'          => 'required|between:2,255'
        ]);

        $object = Trainer::create($data);

        // set attachments
        self::createAttachments(
            $data['attachments'],
            'storage/app/public/forem/trainers',
            'storage/forem/trainers',
            Trainer::class,
            $object->id,
            base_lang()
        );

        return $object;
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'            => 'integer',
            'name'          => 'required|between:2,255'
        ]);

        $object = Trainer::findOrFail($id);

        // update attachments
        self::updateAttachments(
            $data['attachments'],
            'storage/app/public/forem/trainers',
            'storage/forem/trainers',
            Trainer::class,
            $object->id,
            base_lang()
        );

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}
