<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\School;
use App\Models\SchoolAd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SchoolController extends Controller
{

    public function createClass(Request $request)
    {
        $school = $this->userSchool();

        // Создайте новую запись в таблице "Классы"
        Classroom::create(['schoolId' => $school->id, 'grade' => $request->get('grade')]);

        // Верните успешный ответ или выполните другие действия
        return redirect('/school/class');
    }

    public function createSchoolAds(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $image = $request->file('schoolad');
        $randomString = Str::random(4);

        $imgName = 'schoolAd'. $randomString .'.png'; // Новое имя файла
        $image->move(public_path('/images/ad'), $imgName);

        $school = $this->userSchool();
        SchoolAd::create([
            'schoolId' => $school->id,
            'ad' => $request->get('ad'),
            'fileName' => $imgName
        ]);
        return redirect('/school/ads');
    }

    public function showSchool(Request $request): \Illuminate\Contracts\View\View
    {
        $school = $this->userSchool();
        $ad = SchoolAd::where('schoolId', $school->id   )->get();

        return view('showSchool', compact('ad', 'school'));
    }

    public function allClass(Request $request): \Illuminate\Contracts\View\View
    {
        $id = Auth::id();
        $user = User::find($id);
        $grades = Classroom::where('schoolId', $user->schoolId)->get();
        return view('classCreate', compact('grades'));
    }

    public function assignStudentToClass(Request $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validate([
            'studentId' => 'required|integer',
            'classId' => 'required|integer',
            'role' => 'required|string'
        ]);
        // Обновите запись ученика с новыми данными
        User::find($data['studentId'])->update($data);

        // Верните успешный ответ или выполните другие действия
        return response()->json(['message' => 'Ученику успешно присвоены школа и класс'], 200);
    }

    public function showStudentToClass(Request $request): \Illuminate\Contracts\View\View
    {
        $id = Auth::id();
        $user = User::find($id);
        $grades = Classroom::where('schoolId', $user->schoolId)->get();

        return view('assignUsers', compact('grades'));
    }

    public function userSchool()
    {
        $id = Auth::id();
        $user = User::find($id);
        return School::find($user->schoolId);
    }

    public function showSchoolAd(Request $request, $id):\Illuminate\Contracts\View\View
    {
        $id = Auth::id();
        $user = User::find($id);
        $school = School::find($user->schoolId);
        $ads = SchoolAd::find($id);
        return view('schoolAd', compact('ads', 'school'));

    }
}
