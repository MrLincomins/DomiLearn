<?php require_once "layout/header.php"; ?>
<div class="notification-wrapper">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Предложения и запросы</h2>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
        <?php foreach ($users as $user):
        foreach ($wishes as $wish):
        $parts = explode(' ', $user->name); // Разделение ФИО на части по пробелу
        $surname = $parts[0]; // Получение фамилии (первой части)
        $firstLetterOfSurname = mb_substr($surname, 0, 1, 'UTF-8');
        ?>
        <div class="card-style">
            <div class="single-notification">
                <div class="notification">
                    <div class="image warning-bg">
                        <span><?= $firstLetterOfSurname ?></span>
                    </div>
                    <a href="#0" class="content">
                        <h6><?= $user->name ?></h6>
                        <p class="text-sm text-gray">
                            <?= $wish->wishes ?>
                        </p>
                        <span class="text-sm text-medium text-gray"><?= $wish->created_at?></span>
                       </a>
                </div>
                <div class="action">
                    <button class="delete-btn">
                        <i class="lni lni-trash-can"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; endforeach;?>
    </div>
    <!-- end container -->
</div>
<?php require_once "layout/footer.php"; ?>
