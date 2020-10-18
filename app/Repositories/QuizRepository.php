<?php

namespace App\Repositories;

use App\Quiz;
use App\Question;
use Illuminate\Database\Query\Builder;
use App\Exceptions\QuizNotFoundException;

class QuizRepository implements \App\Contracts\Quiz
{
    /**
     * @param string|null $slug
     *
     * @return Quiz
     * @throws QuizNotFoundException
     */
    public function getQuizBySlug(?string $slug): Quiz
    {
        $quiz = Quiz::where('slug', $slug)
        ->where('active', true)
        ->with(['questions' => function (Builder $query): Builder {
            return $query->where('active', true)->with('answers:id,question_id,answer');
        }])
        ->first();

        if ($quiz === null) {
            throw new QuizNotFoundException();
        }

        return $quiz;
    }

    public function getNextQuestionBySlugs(?string $quizSlug, ?string $questionSlug): ?Question
    {
        $next = false;
        $nextQuestion = null;

        $quiz = $this->getQuizBySlug($quizSlug);

        foreach ($quiz->questions as $question) {
            if ($next) {
                $nextQuestion = $question;
                break;
            }
            $next = $question->slug === $questionSlug;
        }

        return $nextQuestion;
    }
}
