<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
?>
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
    <title>библиотека</title>

    <!-- ========== All CSS files linkup ========= -->
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
        <a href="/">
            <img src="/images/logo.jpeg" width="160" height="80" alt="logo"/>
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item nav-item-has-children">
                <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_1"
                    aria-controls="ddmenu_1"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
              <span class="icon">
                <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                      d="M12.9067 14.2908L15.2808 11.9167H6.41667V10.0833H15.2808L12.9067 7.70917L14.2083 6.41667L18.7917 11L14.2083 15.5833L12.9067 14.2908ZM17.4167 2.75C17.9029 2.75 18.3692 2.94315 18.713 3.28697C19.0568 3.63079 19.25 4.0971 19.25 4.58333V8.86417L17.4167 7.03083V4.58333H4.58333V17.4167H17.4167V14.9692L19.25 13.1358V17.4167C19.25 17.9029 19.0568 18.3692 18.713 18.713C18.3692 19.0568 17.9029 19.25 17.4167 19.25H4.58333C3.56583 19.25 2.75 18.425 2.75 17.4167V4.58333C2.75 3.56583 3.56583 2.75 4.58333 2.75H17.4167Z"
                  />
                </svg>
              </span>
                    <span class="text">Авторизация</span>
                </a>
                <ul id="ddmenu_1" class="collapse dropdown-nav">
                    <?php if (!Auth::check()) { ?>
                        <li>
                            <a href="/login"> Войти </a>
                        </li>
                    <?php } ?>
                    <?php if (@$user->role === 'Учитель') { ?>
                        <li>
                            <a href="/register"> Зарегистрировать пользователя </a>
                        </li>
                    <?php } ?>
                    <?php if (Auth::check()) { ?>
                        <li>
                            <a href="/logout"> Выход из аккаунта </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <?php if (Auth::check()) { ?>
            <li class="nav-item nav-item-has-children">
                <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_2"
                    aria-controls="ddmenu_2"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
              <span class="icon">
                  <i class="mdi mdi-book"></i>
              </span>
                    <span class="text">Дневник</span>
                </a>
                <ul id="ddmenu_2" class="collapse dropdown-nav">
                    <li>
                        <a href="/diary"> Просмотр дневника </a>
                    </li>
                    <li>
                        <a href="/diary/subjects"> Создание предметов </a>
                    </li>
                    <li>
                        <a href="/diary/create"> Создание расписания </a>
                    </li>
                    <li>
                        <a href="/diary/grades"> Выставления оценок </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-item-has-children">
                <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_3"
                    aria-controls="ddmenu_3"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
              <span class="icon">
                  <i class="mdi mdi-school"></i>
              </span>
                    <span class="text">Школа</span>
                </a>
                <ul id="ddmenu_3" class="collapse dropdown-nav">
                    <li>
                        <a href="/school"> Просмотр школы </a>
                    </li>
                    <li>
                        <a href="/school/rating"> Оценивание учителей </a>
                    </li>
                    <li>
                        <a href="/school/teachers"> Поиск контактных данных </a>
                    </li>
                    <li>
                        <a href="/school/class"> Создание классов </a>
                    </li>
                    <li>
                        <a href="/school/ads/create"> Создание новостей </a>
                    </li>
                    <li>
                        <a href="/school/user/add"> Добавить пользователя в школу </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-item-has-children">
                <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_4"
                    aria-controls="ddmenu_4"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
              <span class="icon">
                  <i class="mdi mdi-function"></i>
              </span>
                    <span class="text">Остальные функции</span>
                </a>
                <ul id="ddmenu_4" class="collapse dropdown-nav">
                    <li>
                        <a href="/wishes">Отправка пожеланий и запросов</a>
                    </li>
                    <li>
                        <a href="/todo">To Do List </a>
                    </li>
                    <li>
                        <a href="/chat"> Чат </a>
                    </li>
                    <li>
                        <a href="/independent"> Самостоятельные работы </a>
                    </li>
                    <li>
                        <a href="/document"> Просмотр документов </a>
                    </li>
                    <li>
                        <a href="/document/send"> Отправка документов </a>
                    </li>
                </ul>
            </li>
            <? } ?>
            <?php if (@$user->role === 'Учитель') { ?>
                <li class="nav-item nav-item-has-children">
                    <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_9"
                        aria-controls="ddmenu_9"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
              <span class="icon">
                  <i class="mdi mdi-cog"></i>
              </span>
                        <span class="text">Админ-панель</span>
                    </a>
                    <ul id="ddmenu_9" class="collapse dropdown-nav">

                        <li>
                            <a href="/admin/schoolcreate"> Создание школы </a>
                        </li>
                        <li>
                            <a href="/admin/wishes"> Просмотр пожеланий</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>

            <span class="divider"><hr/></span>
        </ul>
    </nav>
    <!--    <div class="promo-box">-->
    <!--        <h3> </h3>-->
    <!--        <p> </p>-->
    <!--        <a href="/" target="_blank" rel="nofollow" class="main-btn primary-btn btn-hover"> </a>-->
    <!--    </div>-->
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
                            <form method="GET" action="/books/search">
                                <input name="tittle" type="text" placeholder="Поиск..."/>
                                <button><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">
                        <div class="profile-box ml-15">
                            <button
                                class="dropdown-toggle bg-transparent border-0"
                                type="button"
                                id="profile"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <div class="profile-info">
                                    <div class="info">
                                        <?php if (!empty($user->name)): ?>
                                            <h6><?php echo $user->name ?></h6>
                                        <?php else: ?>
                                            <h6>Пользователь</h6>
                                        <?php endif; ?>
                                        <div class="image">
                                            <img
                                                src="/resources/images/149452.png"
                                            />
                                            <span class="status"></span>
                                        </div>
                                    </div>
                                </div>
                                <i class="lni lni-chevron-down"></i>
                            </button>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="profile"
                            >
                                <li>
                                    <a href="/account">
                                        <i class="lni lni-user"></i> Профиль
                                    </a>
                                </li>
                                <li>
                                    <a href="/logout"> <i class="lni lni-exit"></i> Выход </a>
                                </li>
                            </ul>
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

