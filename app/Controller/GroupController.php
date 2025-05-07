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
        $search_text = null;
        $filter_course = '';

        if ($request->method === 'POST' && array_key_exists('search_text', $_POST)) {
            $search_text = $request->search_text;
            $filter_course = $request->filter_course;
        }

        if ($request->method === 'POST' && array_key_exists('group', $_POST)) {
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

        $groups = Group::withCount('students')->where('name', 'LIKE', '%'.$search_text.'%')->orderBy('name')->get();
        if (array_key_exists('filter_course', $_POST) && $request->filter_course !== 'all') {
            $groups = $groups->where('course', $request->filter_course);
        }

        return new View('site.groups_manage', ['groups' => $groups, 'search_text' => $search_text, 'selected_course'=> $filter_course]);
    }
}