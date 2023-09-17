<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Document;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\TDList;
use App\Models\TeacherRating;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;

class DiaryController extends Controller
{
    public function allSubjects(Request $request):\Illuminate\Contracts\View\View
    {
        $subjects = Subject::all();
        return view('subjectCreate', compact('subjects'));
    }

    public function createSubject(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        // Получите данные из запроса
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        // Создайте новую запись в таблице "Предметы"
        Subject::create($data);

        return redirect('/diary/subjects');

    }

    public function deleteSubject(Request $request, $id)
    {
        Subject::destroy($id);
        return redirect('/diary/subjects');
    }

    // Метод для создания расписания для классов
    public function storeSchedule(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        // Получите данные из запроса
        foreach ($request->all() as $dayOfWeek => $entries) {

            foreach ($entries as $entryData) {
                Schedule::create([
                    'classId' => $entryData['classId'],
                    'dayOfWeek' => $dayOfWeek,
                    'subjectId' => $entryData['subjectId'],
                    'startTime' => $entryData['startTime'],
                    'endTime' => $entryData['endTime'],
                    'date' => $entryData['desiredDay'],
                ]);
            }
        }

        // Создайте новую запись в таблице "Расписание"

        // Верните успешный ответ или выполните другие действия
        return redirect('/diary');
    }

    public function createSchedule(Request $request)
    {
        $user = User::find(Auth::id());
        $grades = Classroom::where('schoolId', $user->schoolId)->get();
        $subjects = Subject::all();
        $daysOfWeek = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

        $currentDate = new DateTime();

        $currentDayOfWeek = $currentDate->format('N');
        $desiredDayOfWeek = 1; // Например, для понедельника
        $daysUntilDesiredDay = ($desiredDayOfWeek - $currentDayOfWeek + 7) % 7;
        $nextDesiredDay = $currentDate->modify("+$daysUntilDesiredDay days");

        return view('createSchedule', compact('subjects', 'grades', 'daysOfWeek', 'nextDesiredDay'));

    }


    public function weekSchedule(Request $request): \Illuminate\Contracts\View\View
    {
        $daysOfWeek = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
        $schedules = Schedule::orderBy('dayOfWeek')->get();

        $groupedSchedules = [];

        foreach ($daysOfWeek as $day) {
            $groupedSchedules[$day] = $schedules->where('dayOfWeek', $day);
        }

        // В этом примере я не указываю, как получить $studentId.
        // Замените это на вашу логику получения идентификатора студента.

        $grades = Grade::where('studentId', Auth::id())->get();
        $subjects = Subject::all(); // Добавьте эту строку для загрузки данных о предметах

        return view('diary', compact('groupedSchedules', 'daysOfWeek', 'grades', 'subjects'));
    }

    // Метод для выставления оценок
    public function storeGrade(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $subjects = $request->input('subjects');
        $grades = $request->input('grades');
        $userGrades = json_decode($request->input('user_grades'), true);

        foreach ($grades as $studentId => $gradeData) {
            foreach ($gradeData as $date => $grade) {
                // Проверьте, существует ли урок для данного студента и предмета
                $lesson = Schedule::where('classId', $userGrades[$studentId]['classId'])
                    ->where('subjectId', $subjects[$studentId])
                    ->where('date', $date)
                    ->first();


                // Создайте новую запись в таблице "Задания и Оценки"
                Grade::create([
                    'studentId' => $studentId,
                    'subjectId' => $subjects[$studentId],
                    //'classId' => $subjects[],
                    'date' => $date,
                    'grade' => $grade,
                ]);

                // Обновите информацию в user_grades, если это необходимо
                $userGrades[$studentId][$date] = $grade;
            }
        }

        // Обновите user_grades в базе данных или выполните другие действия по сохранению информации.

        // Верните успешный ответ или выполните другие действия
        return redirect('/diary');
    }

    public function createGrade(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $classId = 1;
        $users = User::where('classId', $classId)->get();
        $schedule = Schedule::where('classId', $classId)->get();
        $grades = Grade::where('classId', $classId)->get();
        $subjects = Subject::all();

        foreach ($schedule as $date){
            $datee[] = $date->date;
        }
        $datee = array_unique($datee);

        return view('addGrades', compact('users', 'schedule', 'grades', 'datee', 'subjects'));
    }

    // Метод для записи домашнего задания
    public function recordHomework(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        // Получите данные из запроса
        $data = $request->validate([
            'studentId' => 'required|integer',
            'subjectId' => 'required|integer',
            'date' => 'required|date',
            'homework' => 'required|string',
        ]);

        // Проверьте, существует ли урок для данного студента и предмета
        $lesson = Schedule::where('classId', $data['classId'])
            ->where('subjectId', $data['subjectId'])
            ->where('dayOfWeek', now()->format('l'))
            ->first();

        if (!$lesson) {
            return response()->json(['message' => 'Урок не найден'], 404);
        }

        // Обновите запись в таблице "Задания и Оценки"
        Grade::updateOrCreate(
            ['studentId' => $data['studentId'], 'subjectId' => $data['subjectId'], 'date' => $data['date']],
            ['homework' => $data['homework']]
        );

        // Верните успешный ответ или выполните другие действия
        return redirect('/diary/homework');
    }

    public function createHomework(Request $request)
    {
        $subjects = Subject::all();
        return view('createHomework', compact('subjects'));
    }

    public function createRating(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find(Auth::id());
        $teachers = User::where('schoolId', $user->schoolId)->where('role', 'Учитель')->get();
        return view('teacherRating', compact('teachers'));
    }

    public function storeRating(Request $request)
    {
        $teacherIds = $request->input('teacher_id');
        $ratings = $request->input('rating');
        $comments = $request->input('comment');

        // Перебираем массивы данных и создаем записи в базе данных
        foreach ($teacherIds as $key => $teacherId) {
            $rating = $ratings[$key];
            $comment = $comments[$key];

            // Создаем новую запись в таблице teacherratings
            TeacherRating::create([
                'teacherId' => $teacherId,
                'rating' => $rating,
                'comment' => $comment,
            ]);
        }

        $averageRatings = [];
        foreach ($teacherIds as $teacherId) {
            $averageRating = TeacherRating::where('teacherId', $teacherId)->avg('rating');
            $averageRatings[$teacherId] = $averageRating;
        }

        // Обновим записи пользователей (учителей) с средними рейтингами
        foreach ($teacherIds as $teacherId) {
            User::where('id', $teacherId)->update(['rating' => $averageRatings[$teacherId]]);
        }
        return redirect('/school/teachers');
    }

    public function showTasks(Request $request): \Illuminate\Http\JsonResponse
    {

        $tasks = TDList::where('userId', Auth::id())->get();
        return response()->json(['tasks' => $tasks]);
    }

    public function addTask(Request $request): \Illuminate\Http\JsonResponse
    {
        $task = new TDList;
        $task->userId = Auth::id();
        $task->task = $request->input('task');
        $task->state = 'pending';
        $task->save();

        $tasks = TDList::where('userId', Auth::id())->get();
        return response()->json(['tasks' => $tasks]);
    }

    public function toggleTask(Request $request): \Illuminate\Http\JsonResponse
    {
        $task = TDList::find($request->input('id'));
        $task->state = $task->state === 'completed' ? 'pending' : 'completed';
        $task->save();

        $tasks = TDList::where('userId', Auth::id())->get();
        return response()->json(['tasks' => $tasks]);
    }

    public function deleteTask(Request $request): \Illuminate\Http\JsonResponse
    {
        $task = TDList::find($request->input('id'));
        $task->delete();

        $tasks = TDList::where('userId', Auth::id())->get();
        return response()->json(['tasks' => $tasks]);
    }

    public function sendDocument(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $image = $request->file('document');
        $newFileName = 'document'. Auth::id() .'.png'; // Новое имя файла
        $image->move(public_path('/images/documents'), $newFileName);

        $user = User::find(Auth::id());
        $idUser2 = User::where('classId', $user->classId)->where('role', 'Учитель')->first();

        Document::create([
            'name' => $request->get('name'),
            'idUser' => Auth::id(),
            'idUser2' => $idUser2->id,
            'fileName' => $newFileName
        ]);

        return redirect('/documents');
    }

    public function showDocument(Request $request): \Illuminate\Contracts\View\View
    {
        $documentsSend = Document::where('idUser', Auth::id())->get();
        $documentsReceived = Document::where('idUser2', Auth::id())->get();
        return view('getDocuments', compact('documentsReceived', 'documentsSend'));
    }
}


