<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quiz extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at', 'updated_at',
    ];

    protected $fillable = [
        'name', 'slug', 'image', 'description', 'active', 'started_at', 'ended_at',
    ];

    protected $appends = ['is_finished', 'question'];

    const SLUG_LENGTH = 5;

    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<User>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(UserQuiz::class);
    }

    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<Question>
     */
    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }

    public function createSlug($lenght = self::SLUG_LENGTH): string
    {
        return bin2hex(random_bytes($lenght));
    }

    /**
     * @return false
     */
    public function getIsFinishedAttribute(): bool
    {
        return $this->attributes['finished'] = false;
    }

    public function getQuestionAttribute(): ?Question
    {
        return $this->attributes['question'] = $this->questions[0] ?? null;
    }
}
