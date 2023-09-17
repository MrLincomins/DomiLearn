<?php

namespace App\Http\Controllers;

use App\Models\RequestAndWish;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver;

class AdminController extends Controller
{
    // Проверьте, имеет ли текущий пользователь админские права
    public function createSchool(Request $request): \Illuminate\Http\JsonResponse
    {
        $image = $request->file('schoolImg');
        $imgName = 'schoolImg'. Auth::id() .'.png'; // Новое имя файла
        $image->move(public_path('/images/school'), $imgName);

        // Получите данные из запроса
        // Создайте новую запись в таблице "schools"

        School::create(['name' => $request->get('name'), 'imgName' => $imgName, 'description' => $request->description]);

        // Верните успешный ответ или выполните другие действия
        return response()->json(['message' => 'Школа успешно создана'], 201);
    }

    public function storeWishes(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        RequestAndWish::create([
            'userId' => Auth::id(),
            'wishes' => $request->get('wishes'),
        ]);
        return redirect('/');

    }


    public function showWishes(Request $request): \Illuminate\Contracts\View\View
    {
        $users = [];
        $wishes = RequestAndWish::all();
        foreach ($wishes as $wish){
            $users[] = User::find($wish->userId);
        }
        return view('showWishesAndRequests', compact( 'wishes', 'users'));
    }


}
