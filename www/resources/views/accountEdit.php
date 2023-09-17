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
                                <h2>Изменить анкету</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-elements-wrapper">
                    <form action="/account/edit" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-style mb-30">
                                    <h5 class="mb-25">Поля ввода</h5>
                                    <div class="input-style-2">
                                        <label>Выберите фото для профиля</label>
                                        <input type="file" class="form-control" id="inputGroupFile04" name="logo"
                                               aria-describedby="inputGroupFileAddon04"
                                               aria-label="Загрузка">
                                    </div>
                                    <div class="input-style-2">
                                        <label>Описание</label>
                                        <input name="description" type="text" placeholder="Введите описание профиля"/>
                                        <span class="icon"> <i class="lni lni-key"></i> </span>
                                    </div>
                                    <div class="input-style-2">
                                        <label>Контактные данные</label>
                                        <input name="contact" type="text" placeholder="Введите контактные данные"/>
                                        <span class="icon"> <i class="lni lni-key"></i> </span>
                                    </div>
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button class="main-btn primary-btn btn-hover w-100 text-center"
                                                    type="submit">
                                                Добавить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</body>
<?php require_once "layout/footer.php"; ?>
