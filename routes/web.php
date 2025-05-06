<?php

use Src\Route;

Route::add('GET', '/main', [Controller\SiteController::class, 'main'])
    ->middleware('auth');

Route::add(['GET', 'POST'], '/employees', [Controller\UserController::class, 'users'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/students', [Controller\StudentController::class, 'students'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/groups', [Controller\GroupController::class, 'groups'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/disciplines', [Controller\DisciplineController::class, 'disciplines'])
    ->middleware('auth');
Route::add('GET', '/grades', [Controller\GradeController::class, 'grades'])
    ->middleware('auth');

Route::add(['GET', 'POST'], '/login', [Controller\SiteController::class, 'login']);
Route::add('GET', '/logout', [Controller\SiteController::class, 'logout']);