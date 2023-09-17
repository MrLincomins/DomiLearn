<?php require_once "layout/header.php"; ?>

<body>
<div class="container-fluid">
    <h2 class="mt-4"><?= $school->name ?></h2>
    <div class="row flex-nowrap">
        <div class="col py-3">
            <div class="card mb-3 ">
                <img src="/images/school/<?= $school->imgName ?>" height="300" width="70" class="card-img-top" alt="Responsive image" >

                <div class="card-header">
                    <h4>Визитная карточка</h4>

                    <div class="card-body">
                        <p class="card-text"><?= $school->description ?></p>
                    </div>
                </div>
            </div>
            <h3>Объявления</h3>
            <?php foreach($ad as $ads): ?>

            <div class="card mb-3 mt-2" style="">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/ad/<?= $ads->fileName ?>" width="100" height="100" class="img-fluid" alt="Responsive image"
                             class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><?= $ads->ad?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<?php require_once "layout/footer.php"; ?>
