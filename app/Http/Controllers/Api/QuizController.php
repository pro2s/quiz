<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Quiz as QuizContract;
use App\Http\Controllers\Controller;
use App\Question;
use App\Quiz;

class QuizController extends Controller
{
    /**
     * @var QuizContract
     */
    private $quizes;

    public function __construct(QuizContract $quizes)
    {
        $this->quizes = $quizes;
    }

    public function index()
    {
        return Quiz::where('active', true)->get();
    }

    public function show($slug)
    {
        $quiz = Quiz::where('slug', $slug)
            ->where('active', true)
            ->with(['questions' => function ($query) {
                return $query->where('active', true)->with('answers:id,question_id,answer');
            }])
            ->first();

        if ($quiz) {
            $quiz->makeHidden('questions');
        } else {
            abort(404);
        }
        // TODO: get current question for user

        return $quiz;
    }

    public function next($quizSlug, $questionSlug)
    {
        $nextQuestion = $this->quizes->getNextQuestionBySlugs($quizSlug, $questionSlug);

        return ['question' => $nextQuestion, 'finished' => $nextQuestion === null];
    }
}
