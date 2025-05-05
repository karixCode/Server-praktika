<?php

namespace Controller;

use Model\Post;
use Model\User;
use Src\Route;
use Src\Auth\Auth;
use Src\View;
use Src\Request;

class Site
{
    public function main(): string
    {
        return new View('site.dashboard');
    }

    public function employees(Request $request): string
    {
        if ($request->method === 'POST' && User::create([...$request->all(), 'role_id'=>2])) {
            app()->route->redirect('/main');
        }

        return new View('site.employees_manage');
    }

    public function students(): string
    {
        return new View('site.students_manage');
    }

    public function groups(): string
    {
        return new View('site.groups_manage');
    }

    public function disciplines(): string
    {
        return new View('site.disciplines_manage');
    }

    public function grades(): string
    {
        return new View('site.grades');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/main');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/main');
    }
}
