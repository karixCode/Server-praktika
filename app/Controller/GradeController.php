<?php

namespace Controller;

use Src\View;

class GradeController
{
    public function grades(): string
    {
        return new View('site.grades');
    }
}
