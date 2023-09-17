<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
        rel="shortcut icon"
        type="image/x-icon"
    />
    <title>Создание тестов</title>

    <link rel="stylesheet" href="/resources/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/resources/css/lineicons.css"/>
    <link rel="stylesheet" href="/resources/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="/resources/css/fullcalendar.css"/>
    <link rel="stylesheet" href="/resources/css/main.css"/>
</head>
<body>
<!-- ======== sidebar-nav start =========== -->
<div id="app">
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="#">
                <img src="" alt="logo">
            </a>
        </div>
        <nav class="sidebar-nav">
            <b class="text-left ml-30">1 Вопрос</b>
            <div class="row mt-1">
                <div class="col-2">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-10">
                    <div class="card ml-20" style="width: 140px; height: 110px; position: relative;" v-for="(card, index) in cards" :key="index">
                        <img src="resources/images/area.png" alt="Фотография" class="img-fluid" style="width: 100%; height: 100%;">
                        <div class="card-text text-center" style="position: absolute; top: 0; left: 0; width: 100%;">
                            <p class="m-0" style="font-size: 14px; font-style: italic;">{{ card.inputText }}</p>
                            <!--                             <p class="m-0" style="font-size: 14px; font-style: italic;">{{ card.title }}</p> -->
                            <button class="btn btn-primary mt-2" @click="goToCard(index)">Go to Card</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-45 mt-4">
                <button class="main-btn primary-btn-outline btn-hover" @click="createCard">Создать</button>
            </div>
        </nav>
    </aside>

    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button
                                    id="menu-toggle"
                                    class="main-btn primary-btn btn-hover"
                                >
                                    <i class="lni lni-chevron-left me-2"></i> Меню
                                </button>
                            </div>
                            <div class="header-search d-none d-md-flex">
                                <form>
                                    <input name="name" type="text" placeholder="Введите название теста" v-model="testTitle"/>
                                    <button>
                                        <i class="lni lni-protection"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">

                            <a href="" class="main-btn primary-btn-outline btn-hover">Назад</a>

                            <div class="profile-box ml-15">
                                <form id="postForm" action="/create" method="post">
                                    <input type="hidden" name="cards" :value="JSON.stringify(cards)">
                                    <input type="hidden" name="inputItems" :value="JSON.stringify(inputItems)">
                                    <button class="main-btn success-btn btn-hover" type="submit">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="overlay"></div>
        <div class="container">
            <div class="card mt-3">
                <div class="card-body text-center">
                    <div class="input-group">
                        <input type="text" class="form-control text-center no-border" style="font-size: 24px;"
                               placeholder="Начни вводить свой вопрос" aria-label="Ваш вопрос" aria-describedby="basic-addon2"
                               v-model="cards.find(card => card.active).inputText">
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center mt-4">
                <div class="border border-dashed p-4 text-center" style="width: 700px; height: 400px;">
                    <i class="mdi mdi-image-plus"></i>
                    <p align="center">Перетащите сюда изображение<br>или нажмите, чтобы добавить</p>
                    <button class="btn btn-primary">Добавить изображение</button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mb-3" v-for="(inputItem, index) in inputItems" :key="index">
                    <div class="input-card d-flex align-items-center">
                        <div class="icon-wrapper" :style="'background-color: ' + inputItem.color">
                            <i class="mdi" :class="inputItem.icon"></i>
                        </div>
                        <input type="text" class="no-border form-control flex-grow-1" :placeholder="'Ваш текст здесь ' + inputItem.color"
                               v-model="inputItem.text">
                        <div class="form-check checkbox-style checkbox-success mb-10">
                            <input class="form-check-input" type="checkbox" :value="true" :id="'checkbox-' + index"
                                   v-model="inputItem.checkboxState">
                            <label class="form-check-label" :for="'checkbox-' + index"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            cards: [
                { title: '', active: true, inputText: '', checkboxStates: [false, false, false, false] },
            ],
            inputItems: [
                { color: 'red', icon: 'mdi mdi-triangle mdi-icon', text: '' },
                { color: 'blue', icon: 'mdi mdi-square mdi-icon', text: '' },
                { color: 'yellow', icon: 'mdi mdi-circle mdi-icon', text: '' },
                { color: 'green', icon: 'mdi mdi-rhombus mdi-icon', text: '' },
            ],
            testTitle: '',
        },
        watch: {
            'inputItems': {
                deep: true,
                handler(newInputItems) {
                    this.cards.forEach((card) => {
                        if (card.active) {
                            card.checkboxStates = newInputItems.map(item => item.checkboxState);
                        }
                    });
                }
            }
        },
        methods: {
            createCard() {
                this.cards.push({ title: this.testTitle, active: false, inputText: '', checkboxStates: [false, false, false, false] });
            },
            activateCard(index) {
                this.cards.forEach((card, i) => {
                    card.active = i === index;
                });

                this.inputItems.forEach((item, itemIndex) => {
                    item.text = this.cards.find(card => card.active)[item.color] || '';
                    item.checkboxState = this.cards.find(card => card.active).checkboxStates[itemIndex];
                });
            },
            goToCard(index) {
                this.cards.forEach((card, i) => {
                    if (i === index) {
                        card.active = true;
                    } else {
                        card.active = false;
                    }
                });

                this.inputItems.forEach((item, itemIndex) => {
                    item.text = this.cards.find(card => card.active)[item.color] || '';
                    item.checkboxState = this.cards.find(card => card.active).checkboxStates[itemIndex];
                });
            },

            handleInputChange(item) {
                // Сохраняем данные в текущей карточке
                this.cards.find(card => card.active)[item.color] = item.text;

            }
        }
    });

    document.getElementById("submitButton").addEventListener("click", function() {
        const form = document.getElementById("postForm");
        form.submit();
    });
</script>

<style>

    .icon-wrapper {
        margin-right: 10px;
    }

    .col-md-6 {
        position: relative;
    }

    .input-card {
        display: flex;
        align-items: center;
        padding: 15px;
        border: none;
        border-radius: 10px;
        background-color: #fff;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #dd1935;
        margin-right: 20px;
        border-radius: 10px 0 0 10px;
    }


    .mdi-icon {
        position: absolute;
        font-size: 20px; /* Размер иконки */
        color: #fff; /* Цвет иконки */
        padding: 5px;
    }

    .no-border {
        border: none;
        box-shadow: none;
    }

    .color-picker {
        margin-left: 10px;
    }
</style>

<?php require_once "layout/footerCreate.php"; ?>

