<?php require_once "layout/header.php"; ?>
<body>
<section class="tab-components">
    <div class="container-fluid offset-md-1">
        <section class="table-components">
            <div class="container-fluid">
                <div class="card mb-3" id="card" style="max-width: 1200px ">
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h1 class="card-title text-center">Полученные и отправленные документы, справки</h1>
                            </div>
                        </div>

                        <h2>Отправленные документы</h2>
                        <div class="row">
                            <?php foreach($documentsSend as $document): ?>
                            <div class="col-sm-4 mb-2 mb-sm-1">
                                <div class="card">
                                    <label class="text-center"><?= $document->name ?></label>
                                    <div class="card-body mt-1">
                                        <img src="/images/documents/<?= $document->fileName ?>" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <h2 class="mt-1">Полученные документы</h2>
                        <div class="row">
                            <?php foreach($documentsReceived as $document): ?>
                            <div class="col-sm-4 mb-2 mb-sm-1">
                                <div class="card">
                                    <label class="text-center"><?= $document->name ?></label>
                                    <div class="card-body mt-1">
                                        <img src="/images/documents/<?= $document->fileName ?>" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>
<?php require_once "layout/footer.php"; ?>
