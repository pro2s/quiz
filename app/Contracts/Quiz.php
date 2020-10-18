<?php

namespace App\Contracts;

use App\Quiz as Entity;
use App\Question;

interface Quiz
{
    public function getQuizBySlug(?string $slug): Entity;
    public function getNextQuestionBySlugs(?string $quizSlug, ?string $questionSlug): ?Question;
}
