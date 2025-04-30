<style>
    .login-container {
        max-width: 400px;
        margin: 2rem auto;
        padding: 2rem;
        background: #fff;
        border-radius: 4px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    .login-title {
        text-align: center;
        margin: 0 0 1.5rem 0;
        color: #2c3e50;
        font-size: 1.5rem;
        font-weight: 600;
    }
    .form-group {
        margin-bottom: 1.25rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #34495e;
        font-weight: 500;
        font-size: 0.9rem;
    }
    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d6dbdf;
        border-radius: 3px;
        font-size: 1rem;
        transition: border-color 0.2s;
    }
    .form-group input:focus {
        border-color: #3498db;
        outline: none;
    }
    .login-button {
        width: 100%;
        padding: 0.75rem;
        background-color: #2980b9;
        color: white;
        border: none;
        border-radius: 3px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .login-button:hover {
        background-color: #3498db;
    }
    .error-message {
        color: #c0392b;
        background-color: #fdecea;
        border: 1px solid #f5b7b1;
        padding: 0.75rem;
        border-radius: 3px;
        margin-bottom: 1.25rem;
        text-align: center;
        font-size: 0.9rem;
    }
    .auth-status {
        text-align: center;
        color: #27ae60;
        font-weight: 500;
    }
</style>

<div class="login-container">
    <h2 class="login-title">Вход в систему деканата</h2>

    <?php if (isset($message)): ?>
        <div class="error-message"><?= $message ?></div>
    <?php endif; ?>

    <?php if (!app()->auth::check()): ?>
        <form method="post">
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login" required placeholder="Введите ваш логин">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" required placeholder="Введите пароль">
            </div>
            <button type="submit" class="login-button">Войти</button>
        </form>
    <?php else: ?>
        <p class="auth-status">Вы вошли как <strong><?= app()->auth->user()->name ?></strong></p>
    <?php endif; ?>
</div>