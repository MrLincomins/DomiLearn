<?php require_once "layout/header.php"; ?>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="card mb-3 mt-3" id="card" style="max-width: 1200px">
            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1 class="card-title text-center">Тест 1</h1>
                    </div>
                </div>

                <form id="quizForm">
                    <div class="mb-3">
                        <label for="question1" class="form-label"><span class="mdi mdi-numeric-1-circle"></span>Отрезок, для которого указано, какой из его концов считается началом, а какой - концом, называется</label>
                        <input type="text" class="form-control" id="question1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question2" class="form-label"><span class="mdi mdi-numeric-2-circle"></span>Длиной ненулевого вектора АВ называется</label>
                        <input type="text" class="form-control" id="question2" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question3" class="form-label"><span class="mdi mdi-numeric-3-circle"></span>Условия, при которых векторы считаются равными</label>
                        <input type="text" class="form-control" id="question3" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question4" class="form-label"><span class="mdi mdi-numeric-4-circle"></span>... закон: для любых векторов a и b справедливо равенство a + b = b + a.</label>
                        <input type="text" class="form-control" id="question4" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question5" class="form-label"><span class="mdi mdi-numeric-5-circle"></span>Два ненулевых вектора называются ..., если их длины равны и они противоположно направлены.</label>
                        <input type="text" class="form-control" id="question5" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question6" class="form-label">
                            <span class="mdi mdi-numeric-6-circle"></span>... закон: для любых векторов a, b и c справедливо равенство (a + b) + c = a + (b + c).</label>
                        <input type="text" class="form-control" id="question6" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question7" class="form-label">
                            <span class="mdi mdi-numeric-7-circle"></span>Какие правила сложения векторов существуют?</label>
                        <input type="text" class="form-control" id="question7" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question8" class="form-label">
                            <span class="mdi mdi-numeric-8-circle"></span>... векторов a и b называется такой вектор, сумма которого с вектором b равна вектору a.</label>
                        <input type="text" class="form-control" id="question8" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question9" class="form-label"><span class="mdi mdi-numeric-9-circle"></span>Правило ... : для любых трех точек A, B и C имеет место равенство AB + BC = AC.</label>
                        <input type="text" class="form-control" id="question9" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="question10" class="form-label"><span class="mdi mdi-numeric-10-circle"></span>Отложим от какой-нибудь точки А вектор АВ, затем от точки В отложим вектор ВС. Вектор АС называется ... векторов АВ и ВС.</label>
                        <input type="text" class="form-control" id="question10" aria-describedby="emailHelp">
                    </div>

                    <button type="button" class="btn btn-primary" id="checkAnswersBtn" style="margin-top: 10px;">Готово</button>
                </form>

                <div id="results" style="display: none;">
                    <h3>Правильные ответы:</h3>
                    <ul id="answersList"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Правильные ответы
    const correctAnswers = [
        "Ответ на вопрос 1",
        "Ответ на вопрос 2",
        "Ответ на вопрос 3",
        "Ответ на вопрос 4",
        "Ответ на вопрос 5",
        "Ответ на вопрос 6",
        "Ответ на вопрос 7",
        "Ответ на вопрос 8",
        "Ответ на вопрос 9",
        "Ответ на вопрос 10"
    ];

    // Обработчик клика на кнопку "Готово"
    document.getElementById("checkAnswersBtn").addEventListener("click", function () {
        // Подсчет правильных ответов
        let score = 0;
        const userAnswers = []; // Здесь будут храниться ответы пользователя

// Получение ответов пользователя и проверка на правильность
        for (let i = 1; i <= correctAnswers.length; i++) {
            const userAnswer = document.getElementById(`question${i}`).value; // Замените "question${i}" на ID вашего поля ввода
            userAnswers.push(userAnswer);

            if (userAnswer === correctAnswers[i - 1]) {
                score++;
            }
        }

// Вывод правильных ответов
        const correctAnswersList = document.getElementById("answersList");
        correctAnswersList.innerHTML = "";

        for (let i = 0; i < correctAnswers.length; i++) {
            const listItem = document.createElement("li");
            listItem.textContent = `Вопрос ${i + 1}: ${correctAnswers[i]}`;
            correctAnswersList.appendChild(listItem);
        }

// Отображение результатов
        const correctAnswersSection = document.getElementById("results");
        correctAnswersSection.style.display = "block";

// Отображение количества правильных ответов
        const scoreDisplay = document.createElement("p");
        scoreDisplay.textContent = `Количество правильных ответов: ${score}`;
        correctAnswersSection.appendChild(scoreDisplay);
    });
</script>
</body>
<?php require_once "layout/footer.php"; ?>

