<?php require_once "layout/header.php"; ?>
<body>
<section class="tab-components">
    <div class="container-fluid offset-md-1">
        <div class="row gx-5">
            <div class="col-5">
                <form action="/school/class" method="POST">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-style mb-30 mt-4">
                                <h1 class="mb-25">Добавить класс</h1>
                                <div class="input-style-2">
                                    <input name="grade" type="text" placeholder="Введите цифру и букву класса"/>
                                    <span class="icon"> <i class="lni lni-key"></i> </span>
                                </div>
                                <!-- end input -->
                                <div class="col-12">
                                    <div class="button-group d-flex justify-content-center flex-wrap"
                                         style="display: inline-block">
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
            <div class="col-5">
                <div class="card-style mb-30 mt-4">
                    <h3 class="mb-10">Классы которые есть в вашей школе</h3>
                    <div class="table-wrapper table-responsive">
                        <table class="table striped-table">
                            <thead>
                            <tr>
                                <th>Название класса</th>
                                <th></th>
                            </tr>
                            <!-- end table row-->
                            </thead>
                            <tbody>

                            <?php foreach ($grades as $class): ?>

                            <tr>
                                <td>
                                    <h6 class="text-sm"><?php echo $class->grade ?></h6>
                                </td>
                                <td>
                                    <form
                                        style="display: inline-block"
                                        method="post"
                                        action="/school/class/<?php echo $class->id ?>"
                                    >
                                        <input type="hidden" value="">
                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                        >
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="success-notification" class="alert-box success-alert pl-100 mt-4" style="display: none;">
                <div class="left">
                    <h5 class="text-bold">Success</h5>
                </div>
                <div class="alert" style="max-width: 300px;">
                    <h4 class="alert-heading">Успех</h4>
                    <p class="text-medium">
                        Класс успешно создан.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php require_once "layout/footer.php"; ?>
