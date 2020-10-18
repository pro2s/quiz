<?php

namespace App\Contracts;

use App\Question;
use App\Quiz as Entity;

interface Quiz
{
    public function getQuizBySlug(?string $slug): Entity;

    public function getNextQuestionBySlugs(?string $quizSlug, ?string $questionSlug): ?Question;
}
