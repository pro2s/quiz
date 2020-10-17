<?php

namespace App\Repositories;

use App\Question;
use App\Quiz;
use Illuminate\Database\Query\Builder;

class QuizRepository implements \App\Contracts\Quiz
{
    public function getNextQuestionBySlugs(?string $quizSlug, ?string $questionSlug): ?Question
    {
        $next = false;
        $nextQuestion = null;

        $quiz = Quiz::where('slug', $quizSlug)
            ->where('active', true)
            ->with(['questions' => function (Builder $query): Builder {
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
