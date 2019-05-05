<?php namespace Syscover\Forem\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Forem\Models\Inscription;
use Syscover\Forem\Models\Student;

class InscriptionService extends Service
{
    public function store(array $data)
    {
        $this->validate($data, [
            'group_id'          => 'required|integer',
            'name'              => 'required|between:2,255',
            'tin'               => 'required|between:2,255',

            // company
            'company_sector'    => 'nullable|between:0,50'
        ]);

        // create student if has not id
        if (! $data['student_id'] ?? null)
        {
            if ($data['tin'] ?? null)
            {
                // get student by tin
                $student = Student::where('tin', $data['tin'])->first();
                if ($student)
                {
                    $data['student_id'] = $student->id;
                }
                else
                {
                    $studentService = new StudentService();
                    $student = $studentService->store($data);
                    $data['student_id'] = $student->id;
                }
            }
        }
        
        return Inscription::create($data);
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'                => 'required|integer',
            'group_id'          => 'required|integer',
            'name'              => 'required|between:2,255',
            'tin'               => 'required|between:2,255',

            // company
            'company_sector'    => 'nullable|between:0,50'
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
