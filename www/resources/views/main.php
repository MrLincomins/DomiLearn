<?php require_once "layout/header.php"; ?>
<main>
    <div class="intro">
        <h1>DomiLearn</h1>
        <p>Платформа для обучения</p>
        <button href="/login">Начать учиться и обучать</button>
    </div>
    <div class="row mx-auto" style="align-items: center; max-width: 1000px; margin: auto 0; margin-top: 50px;">
        <div class="col-sm-4 mb-2 mb-sm-1">
            <div class="card border-light mb-3" style="max-width: 18rem; font-size: small; text-align: center;">
                <div class="card-header">DomiLearn</div>
                <div class="card-body">
                    <h5 class="card-title">Возможности</h5>
                    <p class="card-text">Здесь вы сможете обучаться и обучать в комфортных условиях, у вас будут возможности, которые не даст вам ни одна другая платформа..</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-2 mb-sm-1">
            <div class="card border-light mb-3" style="max-width: 18rem; text-align: center; font-size: small;">
                <div class="card-header">DomiLearn</div>
                <div class="card-body">
                    <h5 class="card-title">Учителям</h5>
                    <p class="card-text">Учителя могут создавать свои самостоятельные работы, использовать уже готовые тесты для проведения уроков, видеть стастику успеваемости учеников и ставить им оценки, а также общаться с учениками и их родителями.</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-2 mb-sm-1">
            <div class="card border-light mb-3" style="max-width: 18rem; text-align: center; font-size: small">
                <div class="card-header">DomiLearn</div>
                <div class="card-body">
                    <h5 class="card-title">Ученикам</h5>
                    <p class="card-text">На этой платформе ученик может посмотреть свои оценки, оценивать учителей, преписываться с учителем, просматривать школьные новости, посмотреть свой рейтинг по школе и классу.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

    body {
        margin: 0;
        box-sizing: border-box;
    }
    /* CSS for header */


    .nav-items a {
        text-decoration: none;
        color: #000;
        padding: 35px 20px;
    }
    /* CSS for main section */
    .intro {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 520px;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://prodod.moscow/wp-content/uploads/2020/07/Untitled-1.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .intro h1 {
        font-family: sans-serif;
        font-size: 60px;
        color: #fff;
        font-weight: bold;
        margin: 0;
    }

    .intro p {
        font-size: 20px;
        color: #d1d1d1;
        text-transform: uppercase;
        margin: 20px 0;
    }

    .intro button {
        background-color: blue;
        color: white;
        padding: 10px 25px;
        border: none;
        border-radius: 5px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)
    }

    .achievements .work {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0 40px;
    }

    .achievements .work i {
        width: fit-content;
        font-size: 50px;
        color: #333333;
        border-radius: 50%;
        border: 2px solid #333333;
        padding: 12px;
    }

    .achievements .work .work-heading {
        font-size: 20px;
        color: #333333;
        text-transform: uppercase;
        margin: 10px 0;
    }

    .achievements .work .work-text {
        font-size: 15px;
        color: #585858;
        margin: 10px 0;
    }

    .about-me img {
        width: 500px;
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .about-me-text h2 {
        font-size: 30px;
        color: #333333;
        text-transform: uppercase;
        margin: 0;
    }

    .about-me-text p {
        font-size: 15px;
        color: #585858;
        margin: 10px 0;
    }

    .bottom-links {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 40px 0;
    }

    .bottom-links .links {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0 40px;
    }

    .bottom-links .links span {
        font-size: 20px;
        color: #fff;
        text-transform: uppercase;
        margin: 10px 0;
    }

    .bottom-links .links a {
        text-decoration: none;
        color: #a1a1a1;
        padding: 10px 20px;
    }
</style>
<?php require_once "layout/footer.php"; ?>

