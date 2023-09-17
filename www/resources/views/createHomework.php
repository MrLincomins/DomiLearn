<?php require_once "layout/header.php"; ?>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Запись домашнего задания</h1>
    <form method="POST" action="/diary/homework">
        <div class="mb-3">
            <label for="studentId" class="form-label">ID студента:</label>
            <input type="number" class="form-control" id="studentId" name="studentId" required>
        </div>

        <div class="mb-3">
            <label for="subjectId" class="form-label">Предмет:</label>
            <select class="form-select" id="subjectId" name="subjectId" required>
                <option value="" disabled selected>Выберите предмет</option>
                <?php foreach ($subjects as $subject): ?>
                <option value="<?=$subject->id ?>"><?= $subject->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Дата:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="mb-3">
            <label for="homework" class="form-label">Домашнее задание:</label>
            <textarea class="form-control" id="homework" name="homework" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Записать домашнее задание</button>
    </form>
</div>
</body>
<?php require_once "layout/footer.php"; ?>
