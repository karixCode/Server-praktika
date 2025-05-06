<?php

namespace Controller;

use Model\Student;
use Src\View;

class StudentController
{
    public function students(): string
    {
        $students = Student::with(['gender', 'group'])->get();
        return new View('site.students_manage', ['students' => $students]);
    }
}
