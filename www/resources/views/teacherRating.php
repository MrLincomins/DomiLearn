<?php require_once "layout/header.php"; ?>
<body>
<section class="tab-components">
    <div class="container-fluid offset-md-1">
        <section class="table-components">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Оценивание ваших учителей</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="table-wrapper table-responsive">
                        <form method="POST" action="/school/rating">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th><h6>Учитель</h6></th>
                                    <th><h6>Рейтинг</h6></th>
                                    <th><h6>Комментарий</h6></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($teachers as $teacher): ?>
                                    <tr>
                                        <td class="min-width">
                                            <p><?php echo $teacher->name; ?></p>
                                            <!-- Добавляем скрытое поле для id учителя -->
                                            <input type="hidden" name="teacher_id[]"
                                                   value="<?php echo $teacher->id; ?>">
                                        </td>
                                        <td class="min-width">
                                            <label>
                                                <input type="radio" name="rating[]" value="1"> 1
                                            </label>
                                            <label>
                                                <input type="radio" name="rating[]" value="2"> 2
                                            </label>
                                            <label>
                                                <input type="radio" name="rating[]" value="3"> 3
                                            </label>
                                            <label>
                                                <input type="radio" name="rating[]" value="4"> 4
                                            </label>
                                            <label>
                                                <input type="radio" name="rating[]" value="5"> 5
                                            </label>
                                        </td>
                                        <td class="min-width">
                                            <!-- Здесь создаем инпут для комментария -->
                                            <input type="text" name="comment[]" class="form-control comment-input">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Добавляем кнопку "Готово" для отправки данных -->
                            <button type="submit" class="btn btn-primary">Готово</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript для обработки звездочек
    const stars = document.querySelectorAll('.star');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-rating');
            const starsContainer = star.parentElement;
            const starsArray = Array.from(starsContainer.querySelectorAll('.star'));

            // Обновляем все звёзды в контейнере
            starsArray.forEach(s => {
                if (s.getAttribute('data-rating') <= rating) {
                    s.innerHTML = '★';
                } else {
                    s.innerHTML = '☆';
                }
            });

            // Обновляем значение рейтинга в скрытом поле
            starsContainer.querySelector('input[name="rating"]').value = rating;
        });
    });
</script>


<style>
    /* Стиль для скрытого поля с рейтингом */
    input[name="rating"] {
        display: none; /* Скрываем поле, так как оно нужно только для хранения значения */
    }

    /* Стиль для инпута комментария */
    .comment-input {
        max-width: 300px; /* Максимальная ширина инпута */
        width: 100%; /* Занимать 100% доступной ширины, если меньше максимальной */
    }


</style>
<?php require_once "layout/footer.php"; ?>

