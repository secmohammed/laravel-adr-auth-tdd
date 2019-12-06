<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\User;
use App\Users\Domain\Services\ValidateUserPasswordResetTokenService;
use App\Users\Responders\ValidateUserPasswordResetTokenResponder;

class ValidateUserPasswordResetTokenAction
{
    public function __construct(ValidateUserPasswordResetTokenResponder $responder, ValidateUserPasswordResetTokenService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(User $user, $token)
    {
        return $this->responder->withResponse(
            $this->services->handle($user, $token)
        )->respond();
    }
}
