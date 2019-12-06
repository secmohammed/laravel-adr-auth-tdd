<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\PasswordResetRepository;
use App\Users\Domain\Repositories\ReminderRepository;
use App\Users\Domain\Repositories\UserRepository;
class ResetUserPasswordService extends Service
{

    protected $reminders;
    public function __construct(PasswordResetRepository $passwordReset)
    {
        $this->passwordReset = $passwordReset;
    }
    public function handle(User $user = null, $token = null, $data = [])
    {
        if ($this->passwordReset->complete($user, $token)) {
            $user->update([
                'password' => bcrypt($data['password']),
            ]);
            return new GenericPayload([
                'message' => 'Password Has been changed successfully !',
            ], 201);
        }
    }
}
