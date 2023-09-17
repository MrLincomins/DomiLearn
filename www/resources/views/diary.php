<?php require_once "layout/header.php"; ?>

<body>
<div class="container-fluid">
    <div class="row mt-4">
        <?php foreach ($daysOfWeek as $day) :?>
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col" class="text-sm">Дата</th>
                                <th scope="col" class="text-sm">Предмет</th>
                                <th scope="col" class="text-sm">Что задано</th>
                                <th scope="col" class="text-sm">Оценка</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($groupedSchedules[$day] as $schedule):
                                $dayOfWeekShort = mb_substr($day, 0, 3, 'UTF-8');?>
                                <?php
                                $grade = $grades->where('subjectId', $schedule->subjectId)
                                    ->where('date', $schedule->date)
                                    ->first();
                                $subject = $subjects->where('id', $schedule->subjectId)->first();
                                ?>

                                <tr>
                                    <th scope="row"><?= $schedule->date; ?> <?= $dayOfWeekShort ?></th>
                                    <td class="text-sm"><?= $subject->name ?></td>
                                    <td>
                                        <a class="text-sm" data-toggle="modal" data-target="#myModal<?= $schedule->id ?>">Просмотр дз</a>
                                    </td>
                                    <td class="text-sm">
                                        <?php if ($grade && $grade->grade) : ?>
                                            <?= $grade->grade ?>
                                        <?php else : ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Модальное окно -->
<?php foreach ($daysOfWeek as $day) : ?>
<?php foreach ($groupedSchedules[$day] as $schedule): ?>
    <div class="modal fade" id="myModal<?= $schedule->id ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <h4 class="modal-title">Модальное окно</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Содержимое модального окна -->
                <div class="modal-body">
                    <?php
                    $grade = $grades->where('subjectId', $schedule->subjectId)->where('date', $schedule->date)->first();
                    if ($grade) {
                        echo $grade->homework;
                    } else {
                        echo '<p>Домашнего задания нет.</p>';
                    }
                    ?>
                </div>

                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php endforeach; ?>
</body>
<?php require_once "layout/footer.php"; ?>
