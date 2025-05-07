<style>
    .section-title {
        color: #34495e;
        margin: 2rem 0 1rem;
        font-size: 1.3rem;
        font-weight: 500;
    }

    .employees-table-container {
        max-height: 400px;
        overflow-y: auto;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        margin-bottom: 2rem;
    }

    .employees-table {
        width: 100%;
        border-collapse: collapse;
    }

    .employees-table th {
        background-color: #f8f9fa;
        padding: 12px 15px;
        text-align: left;
        font-weight: 500;
        color: #34495e;
        position: sticky;
        top: 0;
    }

    .employees-table td {
        padding: 12px 15px;
        border-top: 1px solid #e0e0e0;
    }

    .employees-table tr:hover {
        background-color: #f5f7fa;
    }

    .add-employee-form {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 6px;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #34495e;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d6dbdf;
        border-radius: 4px;
        font-size: 1rem;
    }

    .form-group input:focus {
        border-color: #2980b9;
        outline: none;
    }

    .submit-btn {
        background-color: #2980b9;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .submit-btn:hover {
        background-color: #3498db;
    }
</style>

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
                <label for="username">Логин</label>
                <?php if (isset($username_error)): ?>
                    <p class="error-message"><?= $username_error ?></p>
                <?php endif; ?>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <?php if (isset($password_error)): ?>
                    <p class="error-message"><?= $password_error ?></p>
                <?php endif; ?>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="submit-btn">Добавить сотрудника</button>
        </form>
    </div>
</div>