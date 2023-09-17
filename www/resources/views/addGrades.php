<?php require_once "layout/header.php"; ?>
    <body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h2>Добавить предмет</h2>
                <form method="POST" action="/diary/grades">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Ученик</th>
                            <th>Предмет</th>
                            <?php foreach ($datee as $date): ?>
                                <th><?php echo $date; ?></th>
                            <?php endforeach; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user->name; ?></td>
                                <td>
                                    <select name="subjects[<?php echo $user->id; ?>]">
                                        <?php foreach ($subjects as $subject): ?>
                                            <option
                                                value="<?php echo $subject->id; ?>"><?php echo $subject->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <?php foreach ($datee as $date): ?>
                                    <td>
                                        <?php
                                        $grade = $grades->where('studentId', $user->id)
                                            ->where('date', $date)
                                            ->first();
                                        ?>
                                        <select name="grades[<?php echo $user->id; ?>][<?php echo $date; ?>]">
                                            <option value=""></option>
                                            <option value="2" <?php echo $grade && $grade->grade == 2 ? 'selected' : ''; ?>>
                                                2
                                            </option>
                                            <option value="3" <?php echo $grade && $grade->grade == 3 ? 'selected' : ''; ?>>
                                                3
                                            </option>
                                            <option value="4" <?php echo $grade && $grade->grade == 4 ? 'selected' : ''; ?>>
                                                4
                                            </option>
                                            <option value="5" <?php echo $grade && $grade->grade == 5 ? 'selected' : ''; ?>>
                                                5
                                            </option>
                                        </select>
                                    </td>
                                    <?php
                                    // Определите здесь user ID и добавьте его в массив "grades"
                                    $user_id = $user->id;
                                    $grades_array[$user_id][$date] = $grade ? $grade->grade : null;
                                    ?>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="user_grades" value='<?= json_encode($grades_array) ?>'>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    </body>
<?php require_once "layout/footer.php"; ?>
