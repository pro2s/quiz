<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    public function quizzes()
    {
        return $this->belongsToMany(Answer::class);
    }
}
