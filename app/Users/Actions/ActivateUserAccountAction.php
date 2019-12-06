<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\User;
use App\Users\Domain\Services\ActivateUserAccountService;
use App\Users\Responders\ActivateUserAccountResponder;

class ActivateUserAccountAction
{
    public function __construct(ActivateUserAccountResponder $responder, ActivateUserAccountService $services)
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
