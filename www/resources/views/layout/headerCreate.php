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
    <link rel="stylesheet" href="/resources/css/fullcalendar.css"/>
    <link rel="stylesheet" href="/resources/css/main.css"/>
</head>
<body>
<!-- ======== sidebar-nav start =========== -->
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
                <div class="card ml-20" style="width: 140px; height: 110px; position: relative;">
                    <img src="resources/images/area.png" alt="Фотография" class="img-fluid" style="width: 100%; height: 100%;">
                    <div class="card-text text-center" style="position: absolute; top: 0; left: 0; width: 100%;">
                        <p class="m-0" style="font-size: 14px; font-style: italic;">Имеются вопросы</p>
                    </div>
                </div>
            </div>



            </div>
            <div class="ml-45 mt-4">
                <a href="" class="main-btn primary-btn-outline btn-hover">Назад</a>
            </div>
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
                            <form method="GET" action="#">
                                <input name="name" type="text" placeholder="Введите название теста"/>
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
                            <a href="#0" class="main-btn success-btn btn-hover">Готово</a>
                        </div>
                        <!-- profile end -->
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="overlay"></div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.8"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    .loader {
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        display: none;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>

