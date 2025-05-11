<?php
use PHPUnit\Framework\TestCase;
use Model\User;
use Model\Role;

class UserControllerTest extends TestCase
{
    protected function setUp(): void
    {
        $_SERVER['DOCUMENT_ROOT'] = 'D:/apps/xampp/htdocs';

        $GLOBALS['app'] = new Src\Application(new Src\Settings([
            'app' => include $_SERVER['DOCUMENT_ROOT'] . '/praktika/config/app.php',
            'db' => include $_SERVER['DOCUMENT_ROOT'] . '/praktika/config/db.php',
            'path' => include $_SERVER['DOCUMENT_ROOT'] . '/praktika/config/path.php',
        ]));

        if (!function_exists('app')) {
            function app()
            {
                return $GLOBALS['app'];
            }
        }
    }

    /**
     * @dataProvider additionProvider
     * @runInSeparateProcess
     */
    public function testUsers(string $httpMethod, array $userData, string $expectedOutput): void
    {
        if (isset($userData['username']) && $userData['username'] === 'existingUsername') {
            $existingUser = User::get()->first();
            if (!$existingUser) {
                $existingUser = User::create([
                    'username' => 'existing_test_user',
                    'password' => password_hash('test1234', PASSWORD_DEFAULT),
                    'role_id' => Role::where('name', 'employee')->first()->id ?? 1,
                ]);
            }
            $userData['username'] = $existingUser->username;
        }

        $request = $this->createMock(\Src\Request::class);
        $request->method = $httpMethod;
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);

        // Проверяем вывод ошибок
        if (!empty($expectedOutput)) {
            ob_start();
            (new \Controller\UserController())->users($request);
            $output = ob_get_clean();

            // Проверяем каждую ошибку по отдельности
            foreach (explode('||', $expectedOutput) as $expectedPart) {
                $this->assertStringContainsString($expectedPart, $output);
            }
            return;
        }

        (new \Controller\UserController())->users($request);

        $createdUser = User::where('username', $userData['username'])->first();
        $this->assertNotNull($createdUser);

        $createdUser->delete();
    }

    public static function additionProvider(): array
    {
        return [
            [
                'POST',
                ['username' => '', 'password' => ''],
                '<p class="error-message" id="username_error">Поле username пусто</p>' .
                '||<p class="error-message" id="password_error">Поле password пусто</p>'
            ],
            [
                'POST',
                ['username' => 'existingUsername', 'password' => 'password123'],
                '<p class="error-message" id="username_error">Поле username должно быть уникально</p>'
            ],
            [
                'POST',
                ['username' => 'newTestUser123', 'password' => 'validPassword123'],
                ''
            ],
        ];
    }
}