<?php

namespace Controller;

use Model\Discipline;
use Src\View;

class DisciplineController
{
    public function disciplines(): string
    {
        return new View('site.disciplines_manage', ['disciplines' => Discipline::all()]);
    }
}
