<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\User;
use App\Users\Domain\Requests\ResendActivationUserAccountFormRequest;
use App\Users\Domain\Services\ResendActivationUserAccountService;
use App\Users\Responders\ResendActivationUserAccountResponder;

class ResendActivationUserAccountAction
{
    public function __construct(ResendActivationUserAccountResponder $responder, ResendActivationUserAccountService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(User $user)
    {
        return $this->responder->withResponse(
            $this->services->handle($user)
        )->respond();
    }
}
