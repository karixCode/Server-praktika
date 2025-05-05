<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

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

    .filter-form {
        /*background: #f1f5f9;*/
        /*padding: 1.5rem;*/
        /*border-radius: 6px;*/
        /*margin-bottom: 1rem;*/
    }

    .form-row {
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
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Математический анализ</td>
            </tr>
            <tr>
                <td>Программирование</td>
            </tr>
            <tr>
                <td>Базы данных</td>
            </tr>
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
            </div>
            <button type="submit" class="submit-btn">Добавить</button>
        </form>
    </div>

    <h2 class="section-title">Таблица дисциплин изучаемых группой</h2>

    <div class="filter-form">
        <form method="get">
            <div class="form-row">
                <div class="form-group">
                    <label for="filter_group">Группа</label>
                    <select id="filter_group" name="group">
                        <option value="">Все группы</option>
                        <option value="1">401</option>
                        <option value="2">302</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter_course">Курс</label>
                    <select id="filter_course" name="course">
                        <option value="">Все курсы</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter_semester">Семестр</label>
                    <select id="filter_semester" name="semester">
                        <option value="">Все семестры</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            <button type="submit" class="submit-btn search-btn">Поиск</button>
            </div>
        </form>
    </div>

    <div class="table-container">
        <table class="data-table">
            <thead>
            <tr>
                <th>Группа</th>
                <th>Дисциплина</th>
                <th>Курс</th>
                <th>Семестр</th>
                <th>Тип контроля</th>
                <th>Часы</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>401</td>
                <td>Программирование</td>
                <td>4</td>
                <td>8</td>
                <td>Экзамен</td>
                <td>120</td>
            </tr>
            <tr>
                <td>302</td>
                <td>Базы данных</td>
                <td>3</td>
                <td>6</td>
                <td>Зачет</td>
                <td>90</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>