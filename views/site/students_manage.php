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

    .students-table-container {
        max-height: 500px;
        overflow-y: auto;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        margin-bottom: 2rem;
    }

    .students-table {
        width: 100%;
        border-collapse: collapse;
    }

    .students-table th {
        background-color: #f8f9fa;
        padding: 12px 15px;
        text-align: left;
        font-weight: 500;
        color: #34495e;
        position: sticky;
        top: 0;
    }

    .students-table td {
        padding: 12px 15px;
        border-top: 1px solid #e0e0e0;
    }

    .students-table tr:hover {
        background-color: #f5f7fa;
    }

    .add-student-form {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 6px;
        margin-top: 2rem;
    }

    .form-row {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.2rem;
    }

    .form-group {
        flex: 1;
    }

    .form-group > label {
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

    .radio-group {
        margin-top: 0.5rem;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .radio-option input {
        width: fit-content;
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

    <h2 class="section-title">Таблица студентов</h2>
    <div class="students-table-container">
        <table class="students-table">
            <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Пол</th>
                <th>Дата рождения</th>
                <th>Адрес</th>
                <th>Группа</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student->surname ?></td>
                    <td><?= $student->name ?></td>
                    <td><?= $student->patronym ?></td>
                    <td><?= $student->gender->name ?></td>
                    <td><?= date('d.m.Y', strtotime($student->birth_date)) ?></td>
                    <td><?= $student->address ?></td>
                    <td><?= $student->group->name ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="add-student-form">
        <h2 class="section-title">Добавление студента</h2>
        <form method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" id="surname" name="surname" required>
                </div>
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="patronymic">Отчество</label>
                    <input type="text" id="patronymic" name="patronym">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="birth_date">Дата рождения</label>
                    <input type="date" id="birth_date" name="birth_date" required>
                </div>

                <div class="form-group">
                    <label>Пол</label>
                    <div class="radio-group">
                        <?php foreach ($genders as $gender): ?>
                            <label class="radio-option">
                                <input type="radio" name="gender_id" value="<?= $gender->id ?>"
                                    <?= $gender->id == 1 ? 'checked' : '' ?> required>
                                <?= $gender->name ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="group_id">Группа</label>
                    <select id="group_id" name="group_id" required>
                        <option value="">Выберите группу</option>
                        <?php foreach ($groups as $group): ?>
                            <option value="<?= $group->id ?>"><?= $group->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <button type="submit" class="submit-btn">Добавить студента</button>
        </form>
    </div>
</div>