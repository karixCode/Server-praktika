<?php

namespace Controller;

use Model\Grade;
use Src\View;

class GradeController
{
    public function grades(): string
    {
        $grades = Grade::with(['student', 'student.group', 'discipline', 'discipline.control_type'])
            ->selectRaw('
                grades.*,
                AVG(grades.grade) OVER (PARTITION BY grades.student_id, grades.discipline_id) as avg_grade
            ')
            ->get()
            ->groupBy(['student_id', 'discipline_id']);

        return new View('site.grades', ['grades' => $grades]);
    }
}