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
        margin: 0 0 1rem;
        font-size: 1.3rem;
        font-weight: 500;
    }

    .table-container {
        max-height: 400px;
        overflow-y: auto;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        margin-bottom: 2rem;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        background-color: #f8f9fa;
        padding: 12px 15px;
        text-align: left;
        font-weight: 500;
        color: #34495e;
        position: sticky;
        top: 0;
    }

    .data-table td {
        padding: 12px 15px;
        border-top: 1px solid #e0e0e0;
    }

    .data-table tr:hover {
        background-color: #f5f7fa;
    }

    .add-form {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 6px;
        margin-bottom: 2rem;
    }

    .filter-form form {
        display: flex;
        align-items: flex-end;
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
        margin-top: 1rem;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .search-btn {
        background-color: #27ae60;
    }

    .submit-btn:hover {
        background-color: #3498db;
    }

    .search-btn:hover {
        background-color: #2ecc71;
    }
</style>

<div class="container">
    <h1 class="page-title">Деканат</h1>

    <h2 class="section-title">Таблица дисциплин</h2>
    <div class="table-container">
        <table class="data-table">
            <thead>
            <tr>
                <th>Название дисциплины</th>
                <th>Тип зачета</th>
                <th>Количество часов</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($disciplines as $discipline): ?>
            <tr>
                <td><?=$discipline->name?></td>
                <td><?=$discipline->control_type->name?></td>
                <td><?=$discipline->hours?></td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="add-form">
        <h3 class="section-title">Добавление дисциплины</h3>
        <form method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="discipline_name">Название дисциплины</label>
                    <input type="text" id="discipline_name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="hours">Количество часов</label>
                    <input type="number" id="hours" name="hours" min="1" max="999" required>
                </div>

                <div class="form-group">
                    <label for="control_type">Тип контроля</label>
                    <select id="control_type" name="control_type_id" required>
                        <option value="">Выберите тип контроля</option>
                        <?php foreach ($control_types as $type): ?>
                            <option value="<?= $type->id ?>"><?= $type->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="submit-btn">Добавить</button>
        </form>
    </div>
</div>