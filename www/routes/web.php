<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register.php web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//    Z1-81874 КОД тех поддержки

Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
        return view('main');
    });

    Route::get('/create', function () {
        return view('createTest');
    });
    Route::post('/create', [QuestionsController::class, 'createTest']);

    //Пользователи
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout']);


    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/register', function () {
        return view('register');
    });

    Route::get('/account', [AuthController::class, 'account']);

    Route::get('/account/edit', function () {
        return view('accountEdit');
    });

    Route::post('/account/edit', [AuthController::class, 'accountEdit']);
    // Предложения

    Route::get('/wishes', function () {
        return view('wishesAndRequests');
    });
    Route::post('/wishes', [AdminController::class, 'storeWishes']);

    // Админ

    Route::get('/admin/wishes', [AdminController::class, 'showWishes']);

    Route::get('/admin/schoolcreate', function () {
        return view('schoolCreate');
    });


    Route::post('/admin/schoolcreate', [AdminController::class, 'createSchool']);

    // Управление школой

    Route::get('/school', [SchoolController::class, 'showSchool']);

    Route::post('/school/ads/create', [SchoolController::class, 'createSchoolAds']);

    Route::get('/school/ads/create', function () {
        return view('createSchoolAds');
    });

    Route::get('/school/ads/{id}', [SchoolController::class, 'showSchoolAd']);

    Route::get('/school/class', [SchoolController::class, 'allClass']);

    Route::post('/school/class', [SchoolController::class, 'createClass']);

    Route::post('/school/class', [SchoolController::class, 'createClass']);

    Route::get('/school/user/add', [SchoolController::class, 'showStudentToClass']);

    Route::post('/school/user/add', [SchoolController::class, 'assignStudentToClass']);

    Route::get('/school/rating', [DiaryController::class, 'createRating']);

    Route::post('/school/rating', [DiaryController::class, 'storeRating']);

    Route::get('/school/teachers', [AuthController::class, 'showTeachers']);

    Route::get('/school/students', [AuthController::class, 'showStudents']);

    // Управление дневником

    Route::get('/diary/subjects', [DiaryController::class, 'allSubjects']);

    Route::post('/diary/subjects', [DiaryController::class, 'createSubject']);

    Route::post('/diary/subjects/{id}', [DiaryController::class, 'deleteSubject']);

    Route::get('/diary/create', [DiaryController::class, 'createSchedule']);

    Route::post('/diary/create', [DiaryController::class, 'storeSchedule']);

    Route::get('/diary', [DiaryController::class, 'weekSchedule'])->name('diary');

    Route::get('/diary/grades', [DiaryController::class, 'createGrade']);
    Route::post('/diary/grades', [DiaryController::class, 'storeGrade']);

    Route::get('/diary/homework', [DiaryController::class, 'createHomework']);
    Route::post('/diary/homework', [DiaryController::class, 'recordHomework']);

    // To Do List

    Route::get('/todo', function () {
        return view('toDoList');
    });

    Route::get('/todo/show', [DiaryController::class, 'showTasks']);
    Route::post('/todo/delete', [DiaryController::class, 'deleteTask']);
    Route::post('/todo/add', [DiaryController::class, 'addTask']);
    Route::post('/todo/toggle', [DiaryController::class, 'toggleTask']);

    // Управление чатом

    Route::get('/chat', [ChatController::class, 'index']);

    Route::post('/chat/get', [ChatController::class, 'getMessages']);
    Route::post('/chat/send', [ChatController::class, 'sendMessage']);

    //Самостоятельные работы

    Route::get('/independent', function () {
        return view('independentWork');
    });
        Route::get('/independent/work', function () {
        return view('independentFiz');
    });

    // Отправка и просмотр отправленных документов, справок

    Route::get('/document/send', function () {
        return view('documentSend');
    });
    Route::post('/document/send', [DiaryController::class, 'sendDocument']);

    Route::get('/document', [DiaryController::class, 'showDocument']);


});

