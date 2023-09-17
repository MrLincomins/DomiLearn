<?php require_once "layout/header.php"; ?>
<body>
<section class="tab-components">
    <div class="container-fluid offset-md-1" id="app">
        <section class="table-components">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Создание расписания для классов</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-5">
                        <div class="form-elements-wrapper">
                            <form>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <!-- input style start -->
                                        <div class="card-style mb-30">
                                            <h6 class="mb-25">Поля ввода</h6>
                                            <!-- end input -->
                                            <div class="select-style-1">
                                                <label>Выбери класс</label>
                                                <div class="select-position">
                                                    <select class="light-bg" name="classId" v-model="selectedClass">
                                                        <?php foreach ($grades as $class): ?>
                                                            <option
                                                                value="<?php echo $class->id; ?>"><?php echo $class->grade; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="select-style-1">
                                                <label>Выбери предмет</label>
                                                <div class="select-position">
                                                    <select class="light-bg" name="subjectId" v-model="selectedSubject">
                                                        <?php foreach ($subjects as $subject): ?>
                                                            <option
                                                                value="<?php echo $subject->id ?>"><?php echo $subject->name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-style-2">
                                                <label>Начало урока</label>
                                                <input name="startTime" type="time" v-model="lessonStartTime">
                                            </div>
                                            <div class="input-style-2">
                                                <label>Конец урока</label>
                                                <input name="endTime" type="time" v-model="lessonEndTime">
                                            </div>
                                            <div class="col-12">
                                                <div class="button-group d-flex justify-content-center flex-wrap">
                                                    <button class="main-btn primary-btn btn-hover w-100 text-center"
                                                            type="button" @click="addLesson">
                                                        Готово
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">Расписание</h6>
                            <p class="text-sm mb-20">
                                <span>{{ currentDay }} {{ formatDate(nextDesiredDate) }}</span>
                            </p>
                            <div class="table-wrapper table-responsive">
                                <table class="table striped-table">
                                    <thead>
                                    <tr>
                                        <th>Урок</th>
                                        <th><h6>Начало и конец урока</h6></th>
                                        <th><h6>Предмет</h6></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(lesson, index) in schedule[currentDay]" :key="index">
                                        <td>
                                            <h6 class="text-sm">#{{ index + 1 }}</h6>
                                        </td>
                                        <td>
                                            <p>{{ lesson.startTime }} - {{ lesson.endTime }}</p>
                                        </td>
                                        <td>
                                            <p>{{ lesson.subjectId }}</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary" @click="prevDay">Предыдущий день</button>
                            <button class="btn btn-primary" @click="nextDay">Следующий день</button>
                            <div>
                                <button class="btn btn-primary" @click="sendData">Отправить POST-запрос</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.8"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            selectedClass: null, // Выбранный класс
            selectedSubject: '', // Выбранный предмет
            lessonStartTime: '', // Время начала урока
            lessonEndTime: '', // Время окончания урока
            currentDay: 'Понедельник', // Текущий день недели
            schedule: {
                // Объект для хранения расписания для каждого дня недели
                'Понедельник': [],
                'Вторник': [],
                'Среда': [],
                'Четверг': [],
                'Пятница': [],
                'Суббота': [],
            },
            daysOfWeek: ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'], // Дни недели
            currentDayIndex: 0, // Индекс текущего дня недели
            nextDesiredDate: new Date(),

        },
        methods: {
            addLesson: function () {
                // Добавление урока в расписание текущего дня
                const desiredDate = new Date(this.nextDesiredDate);

                this.schedule[this.currentDay].push({
                    classId: this.selectedClass,
                    subjectId: this.selectedSubject,
                    startTime: this.lessonStartTime,
                    endTime: this.lessonEndTime,
                    currentDay: this.currentDay,
                        desiredDay: desiredDate.toISOString().slice(0, 10), // Добавляем дату (год-месяц-день)
                });

                // Очистка полей формы
                this.selectedSubject = '';
                this.lessonStartTime = '';
                this.lessonEndTime = '';
            },
            formatDate(date) {
                const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
                return date.toLocaleDateString('en-US', options);
            },
            prevDay: function () {
                // Переключение на предыдущий день недели
                if (this.currentDayIndex > 0) {
                    this.currentDayIndex--;
                    this.currentDay = this.daysOfWeek[this.currentDayIndex];
                    this.nextDesiredDate.setDate(this.nextDesiredDate.getDate() - 1);

                }
            },
            nextDay: function () {
                // Переключение на следующий день недели
                if (this.currentDayIndex < this.daysOfWeek.length - 1) {
                    this.currentDayIndex++;
                    this.currentDay = this.daysOfWeek[this.currentDayIndex];
                    this.nextDesiredDate.setDate(this.nextDesiredDate.getDate() + 1);
                }
            },
            sendData() {
                axios.post('/diary/create', this.schedule)
                    .then(response => {
                        console.log('Данные успешно отправлены на сервер:', response);
                        window.location.href = '/diary/create'; // Замените на URL новой страницы
                    })
                    .catch(error => {
                        console.error('Ошибка отправки данных на сервер:', error);
                    });
            },
        },
    });
</script>
</body>

<?php require_once "layout/footer.php"; ?>

