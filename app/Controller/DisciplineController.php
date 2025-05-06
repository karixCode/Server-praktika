<?php

namespace Controller;

use Src\View;

class DisciplineController
{
    public function disciplines(): string
    {
        return new View('site.disciplines_manage');
    }
}
