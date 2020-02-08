<?php

namespace App\Http\Controllers\Api;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
     /**
     * Search a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request  $request, $quiz, $question) 
    {
        $id = $request->input('id', null);
        if ($id) {
            $answer = Answer::where('id', $id)
                ->where('active', true)
                ->with(['question.quizzes' => function($query) use($quiz) {
                    return $query->where('slug', $quiz);
                }])
                ->first();
            
            return response()->json(['answer' => $answer->correct]);
        } else {
            return response()->json(['error' => __('Error')], 400);
        }
    }
}
