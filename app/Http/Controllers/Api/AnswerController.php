<?php

namespace App\Http\Controllers\Api;

use App\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AnswerController extends Controller
{
    /**
     * Search a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request, $quiz, $question)
    {
        $id = $request->input('id', null);
        $answer = Answer::where('id', $id)
                ->where('active', true)
                ->with(['question.quizzes' => function (Builder $query) use ($quiz): Builder {
                    return $query->where('slug', $quiz);
                }])
                ->first();

        if ($id && $answer) {
            return response()->json(['answer' => $answer->correct]);
        } else {
            return response()->json(['error' => __('Error')], 400);
        }
    }
}
