<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $user = User::find(Auth::id());
        $users = User::where('classId', $user->classId)->where('id', '!=', Auth::id())->get();
        return view('chat', compact('users'));
    }

    public function getMessages(Request $request): \Illuminate\Http\JsonResponse
    {
        $recipientId = $request->get('recipientId');
        $messages = Chat::where(function ($query) use ($recipientId) {
            $query->where('idUser', Auth::id())
                ->where('idUser2', $recipientId);
        })->orWhere(function ($query) use ($recipientId) {
            $query->where('idUser', $recipientId)
                ->where('idUser2', Auth::id());
        })->get();

        $users = User::pluck('name', 'id'); // Здесь получаем массив ['id' => 'name']

        $messages = $messages->map(function ($message) use ($users) {
            return [
                'message' => $message->message,
                'sender' => ($message->idUser === Auth::id()) ? 'Вы' : $users->get($message->idUser2),
            ];
        });
        return response()->json($messages);
    }

    public function sendMessage(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::find(Auth::id());

        $message = new Chat;
        $message->idUser = Auth::id();
        $message->idUser2 = $request->get('recipientId');
        $message->idSchool = $user->schoolId;
        $message->message = $request->input('message');
        $message->save();
        return response()->json(['status' => 'Message sent']);
    }
}
