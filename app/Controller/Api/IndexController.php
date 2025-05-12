<?php

namespace Controller\Api;

use Src\Request;
use Src\View;

class IndexController
{
    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }
}