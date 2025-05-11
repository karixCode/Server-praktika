
<div class="container">
    <h2 class="section-title">Таблица сотрудников</h2>

    <div class="employees-table-container">
            <table class="employees-table">
                <thead>
                <tr>
                    <th>Логин</th>
                    <th>Пароль</th>
                    <th>Роль</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->username ?></td>
                        <td>••••••••</td>
                        <td><?= $user->role->name ?? 'Не указана' ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
    </div>

    <h2 class="section-title">Добавить сотрудника</h2>

    <div class="add-employee-form">
        <form method="post">
            <div class="form-group">
                <h3><?= $message ?? ''; ?></h3>
                <label for="username">Логин</label>
                <?php if (isset($username_error)): ?>
                    <p class="error-message" id="username_error"><?= $username_error ?></p>
                <?php endif; ?>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <?php if (isset($password_error)): ?>
                    <p class="error-message" id="password_error"><?= $password_error ?></p>
                <?php endif; ?>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="submit-btn">Добавить сотрудника</button>
        </form>
    </div>
</div>