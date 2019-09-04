<?php namespace Syscover\Forem\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Syscover\Forem\Models\Course;

class CoursesImport implements ToModel
{
    private $groupId;

    function __construct($groupId) 
    {
        $this->groupId = $groupId;
    }

    public function model(array $row)
    {
        $courses = Course::where('group_id', $this->groupId)->get(['id', 'tin']);

        // avoid insert first line
        if ($row[0] === 'Nombre del grupo') return null;
        if ($row[1] === 'Nombre') return null;

        // overwrite course with same tin
        $course = $courses->where('tin', $row[6])->first();
        if ($course) $course->delete();

        return new Course([
            'group_id'          => $this->groupId,
            'group_name'        => $row[0],
            'name'              => $row[1],
            'surname'           => $row[2],
            'surname2'          => $row[3],
            'gender'            => $row[4],
            'birth_date'        => $row[5],
            'tin'               => $row[6],
            'ssn'               => $row[7],
            'email'             => $row[8],
            'phone'             => $row[9],
        ]);
    }
}