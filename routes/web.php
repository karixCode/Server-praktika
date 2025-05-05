<?php

use Src\Route;

Route::add('GET', '/main', [Controller\Site::class, 'main'])
    ->middleware('auth');
Route::add('GET', '/employees', [Controller\Site::class, 'employees'])
    ->middleware('admin');
Route::add('GET', '/students', [Controller\Site::class, 'students'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);