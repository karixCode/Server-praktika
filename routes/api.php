<?php

use Src\Route;

Route::add('POST', '/login', [Controller\Api\AuthController::class, 'login']);
Route::add('POST', '/user/create', [Controller\Api\UserController::class, 'employeesCreate']);
Route::add('POST', '/', [Controller\Api\IndexController::class, 'echo']);