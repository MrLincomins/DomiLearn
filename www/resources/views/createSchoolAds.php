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
                                <h2>Создание объявлений</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-elements-wrapper">
                    <form action="/school/ads/create" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-style mb-30">
                                    <h6 class="mb-25">Поля ввода</h6>
                                    <div class="input-style-2">
                                        <label>Выбери фотку для поста</label>
                                        <input type="file" class="form-control" id="inputGroupFile04" name="schoolad"
                                               aria-describedby="inputGroupFileAddon04"
                                               aria-label="Загрузка">
                                    </div>
                                    <div class="input-style-1">
                                        <label>Текст</label>
                                        <textarea name="ad" placeholder="описание" rows="5"></textarea>
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
            </div>
        </section>
    </div>
</section>
</body>
<?php require_once "layout/footer.php"; ?>

