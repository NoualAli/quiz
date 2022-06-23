<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\ValidateParticipent;
use App\Models\QuizEntry;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        try {
            return QuizEntry::create([
                'participent' => $request->full_name,
                'answers' => collect($request->answers)->toJson()
            ]);
        } catch (\Throwable $th) {
            if (env('APP_ENV') == 'local') {
                throw $th;
            } else {
                abort(500, 'On s\'éxcuses, une erreur est survenu.');
            }
        }
    }

    public function validate_participent(ValidateParticipent $request)
    {
        return $request->json(true);
    }

    private function makeJsonAnswers(array $answers)
    {
        foreach ($answers as $key => $value) {
        }
        return json_encode($answers);
    }
}