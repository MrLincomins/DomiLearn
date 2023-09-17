<?php require_once "layout/header.php"; ?>
<body>
<div class="container">
    <div class="card mb-3 mt-4" style="max-width: 40rem;">
        <form method="POST" action="/wishes">
            <div class="card-header">DomiLearn</div>
            <div class="card-body mt-4">
                <h5 class="card-title">Оповещение</h5>
                <p class="card-text">Напишите свои пожелания или просьбы, чтобы мы могли улучшить сайт для более
                    удобного использования.</p>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="text" class="form-control mt-2" placeholder="Просьба" aria-label="Просьба"
                           name="wishes" aria-describedby="addon-wrapping">
                </div>
                <p></p>
                <button class="btn btn-warning mt-2">Послать просьбу</button>
            </div>
        </form>
    </div>
</div>
</body>
<?php require_once "layout/footer.php"; ?>
