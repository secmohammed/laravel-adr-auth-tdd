<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\PasswordResetRepository;
use App\Users\Domain\Repositories\ReminderRepository;
use App\Users\Domain\Repositories\UserRepository;
class ValidateUserPasswordResetTokenService extends Service
{
    protected $users;
    protected $passwordReset;
    protected $activations;
    public function __construct(UserRepository $users, ActivationRepository $activations, PasswordResetRepository $passwordReset)
    {
        $this->users = $users;
        $this->passwordReset = $passwordReset;
        $this->activations = $activations;
    }
    public function handle(User $user = null, $token = null)
    {
        if ($this->activations->completed($user)) {
            $this->passwordReset->hasToken($user, $token);
            return new GenericPayload([
                'message' => 'Alright ' . $user->first_name . ' Let\'s setup a new password',
            ]);
        }
        return new UnauthorizedPayload([
            'message' => 'You have not activated your account',
        ]);
    }
}
