<?php

namespace App\Http\Controllers\Api;

use App\Quiz;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function index()
    {
        return Quiz::where('active', true)->get();
    }

    public function show($slug)
    {
        $quiz = Quiz::where('slug', $slug)
            ->where('active', true)
            ->with(['questions' => function($query) {
                return $query->where('active', true)->with('answers:id,question_id,answer');
            }])
            ->first();

        // TODO: get current question for user

        return $quiz->makeHidden('questions');
    }

    public function next($slug, $questionSlug)
    {
        $question = Question::where('slug', $questionSlug)->first();

        $quiz = Quiz::where('slug', $slug)
            ->where('active', true)
            ->with(['questions' => function($query) {
                return $query->where('active', true)->with('answers:id,question_id,answer');
            }])
            ->first();

        $next = false;
        $nextQuestion = null;

        foreach ($quiz->questions as $question) {
            if ($next) {
                $nextQuestion = $question;
                break;
            }
            $next = $question->slug === $questionSlug;
        }

        return ['question' => $nextQuestion, 'finished' => $nextQuestion === null];
    }
}
