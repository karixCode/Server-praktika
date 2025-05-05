<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .header {
        background-color: #2c3e50;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .logo {
        color: white;
        font-size: 1.5rem;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }

    .logo:hover {
        color: #ecf0f1;
    }

    .auth-link {
        color: white;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        transition: background-color 0.2s;
    }

    .auth-link:hover {
        background-color: rgba(255,255,255,0.1);
    }
</style>
<body>
<header class="header">
    <a href="<?= app()->route->getUrl('/main') ?>" class="logo">Деканат</a>

    <?php if (app()->auth::check()): ?>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="auth-link">Выход (<?= app()->auth->user()->username ?>)</a>
    <?php else: ?>
        <a href="<?= app()->route->getUrl('/login') ?>" class="auth-link">Вход</a>
    <?php endif; ?>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>
