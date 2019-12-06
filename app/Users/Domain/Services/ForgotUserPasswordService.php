<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Mails\ResetPassword;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\PasswordResetRepository;
use App\Users\Domain\Repositories\ReminderRepository;
use App\Users\Domain\Repositories\UserRepository;
use Mail;

class ForgotUserPasswordService extends Service
{
    protected $users;
    protected $activations;
    protected $reminders;
    public function __construct(UserRepository $users, PasswordResetRepository $reminders, ActivationRepository $activations)
    {
        $this->users = $users;
        $this->reminders = $reminders;
        $this->activations = $activations;
    }
    public function handle($data = [])
    {
        $user = $this->users->whereEmail($data['email'])->firstOrFail();

        if ($this->activations->completed($user)) {
            Mail::to($user)->send(
                new ResetPassword(
                    $user,
                    $this->reminders->hasOrCreateToken($user)
                )
            );
            return new GenericPayload([
                'message' => 'Token has been sent to your mail,' . $user->first_name,
            ]);
        }
        return new GenericPayload([
            'message' => 'It looks like you did not activate your account yet.',
        ], 422);
    }
}
