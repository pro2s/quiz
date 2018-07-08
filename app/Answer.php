<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function userAnswers()
    {
        return $this->belongsToMany(UserQuiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
