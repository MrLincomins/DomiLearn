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
                    <form action="/document/send" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-style mb-30">
                                    <h5 class="mb-25">Поля ввода</h5>
                                    <div class="input-style-1">
                                        <label>Выбери кому отправить документ</label>
                                        <select class="form-select" aria-label="">
                                            <option value="Учитель">Классному руководителю</option>
                                        </select>
                                    </div>
                                    <div class="input-style-2">
                                        <label>Напишите название файла</label>
                                        <input name="name" type="text" placeholder="Название файла"/>
                                        <span class="icon"> <i class="lni lni-user"></i>
                                    </div>
                                    <div class="input-style-2">
                                        <label>Выберите документ или справку</label>
                                        <input type="file" class="form-control" id="inputGroupFile04" name="document"
                                               aria-describedby="inputGroupFileAddon04"
                                               aria-label="Загрузка">
                                    </div>
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button class="main-btn primary-btn btn-hover w-100 text-center"
                                                    type="submit">
                                               Отправить
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
