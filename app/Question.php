<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = [
        'title', 'slug', 'image', 'description', 'active',
    ];

    /**
     * @return HasMany
     *
     * @psalm-return HasMany<Answer>
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<Quiz>
     */
    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class)->withTimestamps();
    }
}
