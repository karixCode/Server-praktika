<style>
    .page-title {
        text-align: center;
        color: #2c3e50;
        font-size: 1.8rem;
        font-weight: 600;
    }

    .section-title {
        color: #34495e;
        margin: 2rem 0 1rem;
        font-size: 1.3rem;
        font-weight: 500;
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

    .search-btn {
        background-color: #2980b9;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .search-btn:hover {
        background-color: #3498db;
    }

    .progress-table-container {
        max-height: 500px;
        overflow-y: auto;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
    }

    .progress-table {
        width: 100%;
        border-collapse: collapse;
    }

    .progress-table th {
        background-color: #f8f9fa;
        padding: 12px 15px;
        text-align: left;
        font-weight: 500;
        color: #34495e;
        position: sticky;
        top: 0;
    }

    .progress-table td {
        padding: 12px 15px;
        border-top: 1px solid #e0e0e0;
    }

    .progress-table tr:hover {
        background-color: #f5f7fa;
    }
</style>

<div class="container">
    <h1 class="page-title">Деканат</h1>
    <h2 class="section-title">Таблица успеваемости студентов по дисциплинам</h2>

    <div class="filter-form">
        <form method="get">
            <div class="form-group">
                <label for="student">Студент</label>
                <select id="student" name="student">
                    <option value="">Все студенты</option>
                    <option value="1">Иванов И.И.</option>
                    <option value="2">Петрова М.С.</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hours">Количество часов</label>
                <input type="number" id="hours" name="hours" min="0" placeholder="Все часы">
            </div>
            <div class="form-group">
                <label for="control_type">Тип контроля</label>
                <select id="control_type" name="control_type">
                    <option value="">Все типы</option>
                    <option value="exam">Экзамен</option>
                    <option value="test">Зачет</option>
                </select>
            </div>
            <button type="submit" class="search-btn">Найти</button>
        </form>
    </div>

    <div class="progress-table-container">
        <table class="progress-table">
            <thead>
            <tr>
                <th>Студент</th>
                <th>Группа</th>
                <th>Дисциплина</th>
                <th>Тип контроля</th>
                <th>Средний балл</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Иванов И.И.</td>
                <td>422</td>
                <td>Математический анализ</td>
                <td>Экзамен</td>
                <td>4.5</td>
            </tr>
            <tr>
                <td>Петрова М.С.</td>
                <td>422</td>
                <td>Программирование</td>
                <td>Зачет</td>
                <td>5.0</td>
            </tr>
            <tr>
                <td>Иванов И.И.</td>
                <td>422</td>
                <td>Базы данных</td>
                <td>Экзамен</td>
                <td>4.2</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>