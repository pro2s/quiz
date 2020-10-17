<?php

namespace App\Repositories;

use App\Question;
use App\Quiz;

class QuizRepository implements \App\Contracts\Quiz
{
    public function getNextQuestionBySlugs($quizSlug, $questionSlug): ?Question
    {
        $next = false;
        $nextQuestion = null;

        $quiz = Quiz::where('slug', $quizSlug)
            ->where('active', true)
            ->with(['questions' => function ($query) {
                return $query->where('active', true)->with('answers:id,question_id,answer');
            }])
            ->first();

        if (!$quiz) {
            abort(404);
        }

        $questions = $quiz->questions ?? [];

        foreach ($questions as $question) {
            if ($next) {
                $nextQuestion = $question;
                break;
            }
            $next = $question->slug === $questionSlug;
        }

        return $nextQuestion;
    }
}
