<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guest extends Model
{
    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<Answer>
     */
    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }
}
