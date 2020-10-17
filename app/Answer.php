<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Answer extends Model
{
    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<UserQuiz>
     */
    public function userAnswers(): BelongsToMany
    {
        return $this->belongsToMany(UserQuiz::class);
    }

    /**
     * @return BelongsTo
     *
     * @psalm-return BelongsTo<Question>
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
