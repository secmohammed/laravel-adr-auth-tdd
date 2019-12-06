<?php

namespace App\Users\Domain\Policies;

use App\Users\Domain\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function createUser(User $user)
    {
        return $user->hasRole('create-user');
    }
}
