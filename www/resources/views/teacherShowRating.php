<?php require_once "layout/header.php"; ?>
<body>
<div class="container">
    <h2>Просмотр рейтинга учителей</h2>
    <?php foreach ($teachers as $teacher): ?>
        <div class="card mt-1">
            <div class="card-body">
                <table class="table mt-2">
                    <thead>
                    <tr>
                        <th scope="col">Учитель</th>
                        <th scope="col">Рейтинг</th>
                        <th scope="col">Контакты</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $teacher->name ?></td>
                        <td><?= $teacher->rating ?></td>
                        <td><?= $teacher->contact ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
<?php require_once "layout/footer.php"; ?>
