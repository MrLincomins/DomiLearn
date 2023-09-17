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
                                <h2>Добавить пользователя</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-elements-wrapper">
                    <form action="/register" method="POST">
                        <div class="row">
                            <div class="col-lg-10">
                                <!-- input style start -->
                                <div class="card-style mb-30">
                                    <h6 class="mb-25">Поля ввода</h6>
                                    <div class="input-style-2">
                                        <label>ФИО</label>
                                        <input name="name" type="text" placeholder="ФИО"/>
                                        <span class="icon"> <i class="lni lni-user"></i>
                                    </div>
                                    <!-- end input -->
                                    <div class="input-style-2">
                                        <label>Пароль</label>
                                        <input name="password" type="password" placeholder="Пароль"/>
                                        <span class="icon"> <i class="lni lni-key"></i> </span>
                                    </div>
                                    <!-- end input -->
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button class="main-btn primary-btn btn-hover w-100 text-center"
                                                    type="submit">
                                                Добавить
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end button -->
                                </div>
                                <p align="center">Уже есть аккаунт? <a href="/login" class="btn-registration">Авторизация</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</body>
<?php require_once "layout/footer.php"; ?>
