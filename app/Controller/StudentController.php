<?php

namespace Controller;

use Model\Student;
use Model\Gender;
use Model\Group;
use Src\Request;
use Src\View;

class StudentController
{
    public function students(Request $request): string
    {
        if ($request->method === 'POST') {
            $student = Student::create([
                'surname' => $request->surname,
                'name' => $request->name,
                'patronym' => $request->patronym,
                'gender_id' => $request->gender_id,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'group_id' => $request->group_id,
            ]);

            if ($student) {
                app()->route->redirect('/students');
            }
        }

        $students = Student::with(['gender', 'group'])->get();

        return new View('site.students_manage', [
            'students' => $students,
            'groups' => Group::all(),
            'genders' => Gender::all()
        ]);
    }
}