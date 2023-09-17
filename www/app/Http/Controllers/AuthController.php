<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (Auth::attempt(['name' => $request->input('name'),
            'password' => $request->input('password')])) {
            return redirect('/account');
        }
        return redirect('/login');
    }

    public function register(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $user = User::create([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'key' => mt_rand(1, 99999999999)
        ]);

        Auth::login($user);
        return redirect('/account');
    }

    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }

    public function account(Request $request)
    {
        $user = User::find(Auth::id());
        return view('account', compact('user'));
    }


    public function accountEdit(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $image = $request->file('logo');
        if(!empty($image)) {
            $newFileName = 'logo' . Auth::id() . '.png'; // Новое имя файла
            $image->move(public_path('/images/users'), $newFileName);
            $existingFilePath = '/images/users/' . $newFileName;
            if (file_exists($existingFilePath)) {
                unlink($existingFilePath);
            }
        }

        $description = $request->get('description');
        $contact = $request->get('contact');

        User::find(Auth::id())->update(['description' => $description, 'contact' => $contact]);
        return redirect('/account');
    }

    public function showTeachers()
    {
        $user = User::find(Auth::id());
        $teachers = User::where('schoolId', $user->schoolId)->where('role', 'Учитель')->get();
        return view('teacherShowRating', compact('teachers'));

    }
    public function showStudents()
    {
        $user = User::find(Auth::id());
        $students = User::where('schoolId', $user->schoolId)->where('role', 'Ученик')->get();
        return view('studentsShowRating', compact('students'));

    }

}
