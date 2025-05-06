<?php

namespace Controller;

use Src\View;

class StudentController
{
    public function students(): string
    {
        return new View('site.students_manage');
    }
}
