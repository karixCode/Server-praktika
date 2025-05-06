<?php

namespace Controller;

use Model\Control_type;
use Model\Discipline;
use Src\Request;
use Src\View;

class DisciplineController
{
    public function disciplines(Request $request): string
    {
        if ($request->method === "POST") {
            Discipline::create([
                'name' => $request->name,
                'control_type_id' => $request->control_type_id,
                'hours' => $request->hours,
            ]);

            app()->route->redirect("/disciplines");
        }

        return new View('site.disciplines_manage', ['disciplines' => Discipline::all(), 'control_types' => Control_type::all()]);
    }
}
