<style>
    .page-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 2rem;
        font-size: 1.8rem;
        font-weight: 600;
    }

    .section-title {
        color: #34495e;
        margin: 2rem 0 1rem;
        font-size: 1.3rem;
        font-weight: 500;
    }

    .groups-table-container {
        max-height: 500px;
        overflow-y: auto;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        margin-bottom: 2rem;
    }

    .groups-table {
        width: 100%;
        border-collapse: collapse;
    }

    .groups-table th {
        background-color: #f8f9fa;
        padding: 12px 15px;
        text-align: left;
        font-weight: 500;
        color: #34495e;
        position: sticky;
        top: 0;
    }

    .groups-table td {
        padding: 12px 15px;
        border-top: 1px solid #e0e0e0;
    }

    .groups-table tr:hover {
        background-color: #f5f7fa;
    }

    .add-group-form {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 6px;
        margin-top: 2rem;
    }

    .form-row {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1.2rem;
    }

    .form-group {
        flex: 1;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #34495e;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d6dbdf;
        border-radius: 4px;
        font-size: 1rem;
    }

    .form-group input:focus,
    .form-group select:focus {
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
    <h1 class="page-title">Деканат</h1>
    <h2 class="section-title">Таблица групп</h2>

    <div class="groups-table-container">
        <table class="groups-table">
            <thead>
            <tr>
                <th>Группа</th>
                <th>Количество студентов</th>
                <th>Курс</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($groups as $group): ?>
                <tr>
                    <td><?= $group->name ?></td>
                    <td class="groups-count"><?= $group->students_count ?></td>
                    <td><?= $group->course ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="add-group-form">
        <h2 class="section-title">Добавление группы</h2>
        <form method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="group">Группа</label>
                    <input type="text" id="group" name="group" required>
                </div>
                <div class="form-group">
                    <label for="course">Курс</label>
                    <input type="number" id="course" name="course" min="1" max="6" required>
                </div>
            </div>

            <button type="submit" class="submit-btn">Добавить</button>
        </form>
    </div>
</div>