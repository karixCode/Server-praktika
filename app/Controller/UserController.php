<?php

namespace Controller;

use Src\Request;
use Src\View;
use Model\Role;
use Model\User;

class UserController
{
    public function users(Request $request): string
    {
        if ($request->method === 'POST' && User::create([...$request->all(), 'role_id'=>Role::where('name', 'employee')->first()->id])) {
            return new View('site.employees_manage', ['users' => User::all()]);
        }

        $users = User::all();
        return new View('site.employees_manage', ['users' => $users]);
    }
}
