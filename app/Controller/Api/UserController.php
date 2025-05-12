<?php

namespace Controller\Api;

use Model\Role;
use Model\User;
use PhpValidator\Validator;
use Src\Request;
use Src\View;

class UserController
{
    public function employeesCreate(Request $request): void
    {
        $validator = new Validator($request->all(), [
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'min:6', 'max:16']
        ], [
            'required' => 'Поле :field пусто',
            'unique' => 'Поле :field должно быть уникально',
            'min' => 'Поле :field слишком короткое',
            'max' => 'Поле :field слишком длинное',
        ]);

        if ($validator->fails()) {
            $errors = [];

            foreach ($validator->errors() as $field => $messages) {
                if (!empty($messages)) {
                    $errors[$field] = $messages[0];
                }
            }

            (new View)->toJSON(['errors' => $errors]);
            return;
        }

        $user = User::create([
            ...$request->all(),
            'role_id' => Role::where('name', 'employee')->first()->id
        ]);

        if ($user) {
            (new View)->toJSON([
                'message' => 'Пользователь успешно создан',
                'user' => User::where('username', $request->username)->first()
            ]);
        }
    }
}
