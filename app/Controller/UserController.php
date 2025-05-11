<?php

namespace Controller;

use Src\Request;
use Src\View;
use Model\Role;
use Model\User;
use PhpValidator\Validator;

class UserController
{

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }

    public function users(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'username' => ['required', 'unique:users,username'],
                'password' => ['required', 'min:6', 'max:16']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'min' => 'Поле :field слишком короткое',
                'max' => 'Поле :field слишком длинное',
            ]);

            if($validator->fails()){
                return new View('site.employees_manage',
                    ['username_error' => $validator->errors()['username'][0] ?? null,
                    'password_error' => $validator->errors()['password'][0] ?? null,
                    'users' => User::all()]);
            }

            if (User::create([...$request->all(), 'role_id'=>Role::where('name', 'employee')->first()->id])) {
                app()->route->redirect('/employees');
            }
        }

        $users = User::all();
        return new View('site.employees_manage', ['users' => $users]);
    }
}
