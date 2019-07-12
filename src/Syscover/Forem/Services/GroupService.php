<?php namespace Syscover\Forem\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Admin\Traits\Attachable;
use Syscover\Forem\Models\Group;

class GroupService extends Service
{
    use Attachable;

    public function store(array $data)
    {
        $this->validate($data, [
            'profile_id'        => 'required|integer',
            'code'              => 'required|between:2,255',
            'slug'              => 'required|between:2,255',
            'category_id'       => 'required|integer',
            'target_id'         => 'required|integer',
            'assistance_id'     => 'required|integer',
            'type_id'           => 'required|integer',
            'hours'             => 'required|integer'        
        ]);

        $object = Group::create($data);

        // create composite code
        $object->composite_code = $this->getCompositeCode($object);
        $object->save();

        // set attachments
        self::createAttachments(
            $data['attachments'],
            'storage/app/public/forem/groups',
            'storage/forem/groups',
            Group::class,
            $object->id,
            $object->lang_id
        );

        // check if is searchable
        $this->isSearchable($object);

        return $object;
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'                => 'required|integer',
            'profile_id'        => 'required|integer',
            'code'              => 'required|between:2,255',
            'slug'              => 'required|between:2,255',
            'category_id'       => 'required|integer',
            'target_id'         => 'required|integer',
            'assistance_id'     => 'required|integer',
            'type_id'           => 'required|integer',
            'hours'             => 'required|integer',
        ]);

        $object = Group::findOrFail($id);

        // update attachments
        self::updateAttachments(
            $data['attachments'],
            'storage/app/public/forem/groups',
            'storage/forem/groups',
            Group::class,
            $object->id,
            $object->lang_id
        );

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // create composite code
        $object->composite_code = $this->getCompositeCode($object);

        // save changes
        $object->save();

        // check if is searchable
        $this->isSearchable($object);

        return $object;
    }

    private function isSearchable(Group $object)
    {
        // we update record if has scout search engine, for register relations
        if (has_scout())
        {
            if($object->publish)
            {
                $object->searchable();
            }
            else
            {
                $object->unsearchable();
            }
        }
    }

    private function getCompositeCode(Group $object)
    {
        $code           = '';
        $modality       = collect(config('pulsar-forem.modalities'))->where('id', $object->expedient->modality_id)->first();

        switch ($modality->id)
        {
            case 1:
                $code = $modality->code . '/' . $object->expedient->year . '/' . $object->expedient->code . '/' . $object->action->code . '/' . $object->code;
                break;
            case 2:
                $code = $modality->code . '/' . $object->expedient->year . '/' . $object->prefix_id . '/' . $object->code;
                break;
            case 3:
                $code = $modality->code . '/' . $object->expedient->year . '/' . $object->prefix_id . '/' . $object->action->code;
                break;
            case 4:
                $code = $modality->code . '/' . $object->expedient->year . '/' . $object->prefix_id . '/' . $object->action->code;
                break;
            case 5:
                $code = $modality->code . '/' . $object->expedient->year . '/' . $object->prefix_id . '/' . $object->action->code;
                break;
            case 6:
                $code = $modality->code . '/' . $object->expedient->ambit . '/' . $object->expedient->year . '/' . $object->prefix_id . '/' . $object->action->code;
                break;
        }

        if(! $object) throw new \Exception('Composite code is nor available');

        return $code;
    }
}
