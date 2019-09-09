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
            'group_id'              => $this->groupId,
            'group_name'            => $row[0],
            'name'                  => $row[1],
            'surname'               => $row[2],
            'surname2'              => $row[3],
            'gender'                => $row[4],
            'birth_date'            => $row[5],
            'tin'                   => $row[6],
            'ssn'                   => $row[7],
            'email'                 => $row[8],
            'phone'                 => $row[9],
            'mobile'                => $row[10],
            'address'               => $row[11],
            'province'              => $row[12],
            'zip'                   => $row[13],
            'locality'              => $row[14],
            'priority_collective'   => $row[15],
            'collective'            => $row[16],
            'employment_situation'  => $row[17],
            'academic_level'        => $row[18],
            'professional_category' => $row[19],
            'functional_area'       => $row[20],
            'student_status'        => $row[21],
            'evaluation'            => $row[22],
            'practices'             => $row[23],
            'practical_evaluation'  => $row[24],
            'practical_hours'       => $row[25],
            'starts_at'             => $row[26],
            'ends_at'               => $row[27],
            'hours'                 => $row[28],
            'company_name'          => $row[29],
            'company_tin'           => $row[30],
            'company_kind_society'  => $row[31],
            'company_pyme'          => $row[32],
            'company_legal_holder'  => $row[33],
            'company_person_holder' => $row[34],
            'company_sector'        => $row[35],
            'company_trademark'     => $row[36],
            'company_document_type' => $row[37],
            'company_ssn'           => $row[38],
            'company_province'      => $row[39],
            'company_locality'      => $row[40]
        ]);
    }
}