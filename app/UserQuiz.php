<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserQuiz extends Model
{
    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<Answer>
     */
    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }
}
