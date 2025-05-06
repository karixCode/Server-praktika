<?php

namespace Controller;

use Src\View;

class GroupController
{
    public function groups(): string
    {
        return new View('site.groups_manage');
    }
}
