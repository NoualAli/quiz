<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\ValidateParticipent;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        return $request->answers;
    }

    public function validate_participent(ValidateParticipent $request)
    {
        return $request->json(true);
    }
}