<?php

namespace Controller;

use Model\Group;
use Src\View;
use Src\Request;
use Model\Student;

class GroupController
{
    public function groups(Request $request): string
    {
        if ($request->method === 'POST' && array_key_exists('group', $_POST)) {
            echo $request->group;
            Group::create([
                'name' => $request->group,
                'course' => $request->course,
                'user_id' => app()->auth->user()->id
            ]);
            app()->route->redirect('/groups');
        }

        if ($request->method === 'POST' && array_key_exists('delete_group', $_POST)) {
            $group = Group::find($request->delete_group);

            if ($group) {
                Student::where('group_id', $group->id)->delete();
                $group->delete();
            }

            app()->route->redirect('/groups');
        }

        $groups = Group::withCount('students')->orderBy('name')->get();

        return new View('site.groups_manage', ['groups' => $groups]);
    }
}