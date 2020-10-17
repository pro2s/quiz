<?php

namespace App\Contracts;

use App\Question;

interface Quiz
{
    public function getNextQuestionBySlugs($quizSlug, $questionSlug): ?Question;
}
