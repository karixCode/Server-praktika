<?php

namespace Controller;

use Src\Request;
use Src\View;
use Model\User;

class UserController
{
    public function users(Request $request): string
    {
        if ($request->method === 'POST' && User::create([...$request->all(), 'role_id'=>2])) {
            $users = User::all();
            return new View('site.employees_manage', ['users' => $users]);
        }

        $users = User::all();
        return new View('site.employees_manage', ['users' => $users]);
    }
}
