<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<Role>
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param string|array $roles
     *
     * @return bool
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function authorizeRoles($roles): bool
    {
        $result = $this->hasAnyRole($roles) || $this->hasRole($roles);

        if (!$result) {
            abort(401, 'This action is unauthorized.');
        }

        return $result;
    }

    /**
     * Check multiple roles.
     *
     * @param string|array $roles
     *
     * @return bool
     */
    public function hasAnyRole($roles): bool
    {
        return \is_array($roles)
            && null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role.
     *
     * @param string|array $role
     *
     * @return bool
     */
    public function hasRole($role): bool
    {
        return \is_string($role)
            && null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * @return BelongsToMany
     *
     * @psalm-return BelongsToMany<Quiz>
     */
    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class)->using(UserQuiz::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
