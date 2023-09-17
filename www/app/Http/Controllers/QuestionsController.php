<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function createTest(Request $request)
    {
        $cards = json_decode($request->input('cards'), true);
        dd($cards);
    }
}
