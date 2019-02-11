<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'name', 'slug', 'image', 'description', 'active' ,'started_at', 'ended_at'
    ];

    const SLUG_LENGTH = 5;

    public function users()
    {
        return $this->belongsToMany(User::class)->using(UserQuiz::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }

    public function createSlug($lenght = self::SLUG_LENGTH)
    {
        return bin2hex(random_bytes($lenght));
    }
}
