<?php

namespace App\Http\Controllers\Api;

use App\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AnswerController extends Controller
{
    /**
     * Search a listing of the resource.
     * @param string $quiz
     * @param string $question
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request, $quiz, $question)
    {
        /** @var string|null $id */
        $id = $request->input('id', null);
        $answer = Answer::where('id', $id)
                ->where('active', true)
                ->with(['question.quizzes' => function (BelongsToMany $query) use ($quiz): BelongsToMany {
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
