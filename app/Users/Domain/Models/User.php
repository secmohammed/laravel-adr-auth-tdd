<?php

namespace App\Users\Domain\Models;

use Artify\Artify\Traits\Roles\Roles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, Roles;

    protected $guarded = ['id', 'company_id'];

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
    public function generateAuthToken()
    {
        return \JWTAuth::fromUser($this);
    }
    public function activation()
    {
        return $this->hasOne(Activation::class, 'user_id', 'id');
    }

    public function isActivated()
    {
        return $this->activation()->whereNotNull('completed_at')->exists();
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'user_id', 'id');
    }
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
