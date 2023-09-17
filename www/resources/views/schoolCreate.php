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
                                <h2>Создание школы</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-elements-wrapper">
                    <form action="/admin/schoolcreate" method="POST" id="schoolCreateForm">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-style mb-30">
                                    <h6 class="mb-25">Поля ввода</h6>
                                    <div class="input-style-2">
                                        <label>Школа</label>
                                        <input name="name" type="text" placeholder="Название новой школы"/>
                                        <span class="icon"> <i class="lni lni-key"></i> </span>
                                    </div>
                                    <div class="input-style-2">
                                        <label>Выберите фотку школы</label>
                                        <input type="file" class="form-control" id="inputGroupFile04" name="schoolImg"
                                               aria-describedby="inputGroupFileAddon04"
                                               aria-label="Загрузка">
                                    </div>
                                    <div class="input-style-1">
                                        <label>Описание школы</label>
                                        <textarea name="description" placeholder="описание" rows="5"></textarea>
                                    </div>
                                    <!-- end input -->
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button class="main-btn primary-btn btn-hover w-100 text-center"
                                                    type="submit">
                                                Создать
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end button -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="success-notification" class="alert-box success-alert pl-100 mt-4" style="display: none;">
                    <div class="left">
                        <h5 class="text-bold">Success</h5>
                    </div>
                    <div class="alert" style="max-width: 300px;">
                        <h4 class="alert-heading">Успех</h4>
                        <p class="text-medium">
                            Школа успешно создана.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successNotification = document.getElementById('success-notification');
        const form = document.getElementById('schoolCreateForm');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Соберите данные из формы
            const formData = new FormData(form);

            // Отправьте POST-запрос с данными на сервер
            axios.post('/admin/schoolcreate', formData)
                .then(function (response) {
                    // После успешной отправки формы, отобразите уведомление
                    successNotification.style.display = 'block';

                    // Опционально: Через некоторое время скройте уведомление (например, через 5 секунд)
                    setTimeout(function () {
                        successNotification.style.display = 'none';
                    }, 5000); // 5000 миллисекунд (5 секунд)

                    // Опционально: Обработайте другие действия после успешной отправки формы
                    console.log('Школа успешно создана.');
                })
                .catch(function (error) {
                    // Опционально: Обработайте ошибки, если они возникнут
                    console.error('Ошибка при создании школы:', error);
                });
        });
    });
</script>
<?php require_once "layout/footer.php"; ?>
