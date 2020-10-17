<?php

namespace App\Contracts;

use App\Question;

interface Quiz
{
    public function getNextQuestionBySlugs(?string $quizSlug, ?string $questionSlug): ?Question;
}
