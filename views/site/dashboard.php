<style>
    .dashboard {
        margin-top: 2rem;
    }

    .dashboard-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 2rem;
        font-size: 1.8rem;
        font-weight: 600;
    }

    .welcome-message {
        text-align: center;
        color: #34495e;
        margin-bottom: 2.5rem;
        font-size: 1.2rem;
    }

    .functionality-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        padding: 0;
        list-style: none;
    }

    .functionality-item {
        background: #2980b9;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .functionality-item:hover {
        background: #3498db;
        transform: translateY(-2px);
    }

    .functionality-link {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.8rem 1rem;
        color: white;
        text-decoration: none;
        font-weight: 500;
        font-size: 1.1rem;
        text-align: center;
    }
</style>

<div class="container">
    <div class="dashboard">
        <h1 class="dashboard-title">Деканат</h1>

        <?php if (app()->auth::check()): ?>
            <div class="welcome-message">Добро пожаловать, <?= app()->auth->user()->username ?>!</div>
        <?php endif; ?>

        <h2 style="margin-bottom: 1.5rem; color: #34495e; font-size: 1.3rem;">Доступный функционал:</h2>

        <ul class="functionality-list">
            <?php if (app()->auth->user()->isAdmin()): ?>
                <!-- Администратор -->
                <li class="functionality-item">
                    <a href="<?= app()->route->getUrl('/employees') ?>" class="functionality-link">Сотрудники</a>
                </li>
            <?php else: ?>
                <!-- Сотрудник -->
                <li class="functionality-item">
                    <a href="<?= app()->route->getUrl('/students') ?>" class="functionality-link">Студенты</a>
                </li>
                <li class="functionality-item">
                    <a href="<?= app()->route->getUrl('/groups') ?>" class="functionality-link">Группы</a>
                </li>
                <li class="functionality-item">
                    <a href="<?= app()->route->getUrl('/disciplines') ?>" class="functionality-link">Дисциплины</a>
                </li>
                <li class="functionality-item">
                    <a href="<?= app()->route->getUrl('/progress') ?>" class="functionality-link">Успеваемость</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>