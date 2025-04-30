<?php

use Src\Route;

Route::add('GET', '/main', [Controller\Site::class, 'main'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);