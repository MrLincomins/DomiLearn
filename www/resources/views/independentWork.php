<?php require_once "layout/header.php"; ?>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="card mb-3" id="card" style="max-width: 1200px ">
            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1 class="card-title text-center">Самостоятельные работы</h1>
                    </div>
                </div>

                <h2>Математика</h2>


                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Самостоятельная работа по математика за 10 класс</h5>
                                <p class="card-text">Геометрия, векторы и точки</p>
                                <a href="/independent/work" class="btn btn-primary">Начать</a>
                            </div>
                        </div>
                    </div>
                </div>


                <h2>Русский</h2>


                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Самостоятельная работа по русскому за 10 класс</h5>
                                <p class="card-text">Не сделано</p>
                                <a href="#" class="btn btn-primary">Начать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .card {
                margin: 0 auto; /* Added */
                float: none; /* Added */
                margin-bottom: 10px; /* Added */
                margin-top: 4px;
            }
        </style>
    </div>
</div>
</body>
<?php require_once "layout/footer.php"; ?>
