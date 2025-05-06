<?php

namespace Controller;

use Model\Group;
use Model\User;
use Src\View;
use Src\Request;

class GroupController
{
    public function groups(Request $request): string
    {
        if ($request->method === 'POST') {
            Group::create([
                'name' => $request->group,
                'course' => $request->course,
                'user_id' => app()->auth->user()->id
            ]);

            app()->route->redirect('/groups');
        }

        $groups = Group::withCount('students')->orderBy('name')->get();

        return new View('site.groups_manage', ['groups' => $groups]);
    }
}