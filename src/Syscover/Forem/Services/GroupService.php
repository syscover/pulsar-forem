<?php namespace Syscover\Forem\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Admin\Traits\Attachable;
use Syscover\Forem\Models\Group;
use Syscover\Forem\Models\Inscription;
use Syscover\Forem\Models\Course;

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

        // save composite code and execute searchable methods from laravel scout
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

        return $object;
    }

    public function subscribeInscription(int $inscriptionId)
    {
        $inscription    = Inscription::find($inscriptionId);
        $genders        = collect(config('pulsar-forem.genders'));
        $course         = new Course();

        // group
        $course->group_id = $inscription->group_id;
        $course->group_name = $inscription->group->name;
        $course->group_starts_at = $inscription->group->starts_at;
        $course->group_ends_at = $inscription->group->ends_at;

        // aux
        $gender = $genders->first(function($value) use ($inscription) { return $value->id === $inscription->gender; });
        $province = $inscription->province;
        $locality = $inscription->locality;

        // date student
        $course->name = $inscription->name;
        $course->surname = $inscription->surname;
        $course->surname2 = $inscription->surname2;
        $course->gender = $gender ? $gender->name : null;
        $course->birth_date = $inscription->birth_date;
        $course->tin = $inscription->tin;
        $course->ssn = $inscription->ssn;
        $course->email = $inscription->email;
        $course->phone = $inscription->phone;
        $course->mobile = $inscription->mobile;
        $course->address = $inscription->address;
        $course->province = $province ? $province->name : null;
        $course->zip = $inscription->zip;
        $course->locality = $locality ? $locality->name : null;

        $course->save();
    }

    public function unsubscribeInscription(int $courseId)
    {
        $inscription = Course::find($courseId);
        $inscription->delete();
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
