<?php require_once "layout/header.php"; ?>
<body>
<div class="container">
<div class="card mt-4 ml-225" style="width: 750px">
    <div class="card-body">
        <link href="" rel="stylesheet"
              integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
              crossorigin="anonymous">
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-8 pt-lg-1">
                        <br/>
                        <img src="/images/users/logo<?= $user->id; ?>.png" width="150" height="150" class="float-start imgshadow rounded " alt="">
                        <h3 class="mb-3 ml-100"><?= $user->name ?></h3>
                        <p class="fw-bold fs-5  ml-100">Должность</p>
                        <p class=" ml-100"><?= $user->role ?></p>
                        <p class="fw-bold fs-5   ml-100">Рейтинг</p>
                        <p class="ml-100"><span class=" mdi mdi-star-circle"></span> </p>
                    </div>
                    <div style="text-align: right;" class="col-lg-5">
                    </div>
                </div>
            </div>
        </section>
        <div class="card mt-2">
            <div class="card-body mb-20">
                <p><?= $user->description ?></p>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body mb-20">
                <p><?= $user->contact ?></p>
            </div>
        </div>
    </div>
    <p align="center">Хочешь изменить анкету? <a href="/account/edit" class="btn-registration">Изменить</a>
    </p>
</div>
</div>
</body>
<?php require_once "layout/footer.php"; ?>
