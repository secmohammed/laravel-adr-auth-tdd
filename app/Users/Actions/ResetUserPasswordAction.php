<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\User;
use App\Users\Domain\Requests\ResetUserPasswordFormRequest;
use App\Users\Domain\Services\ResetUserPasswordService;
use App\Users\Responders\ResetUserPasswordResponder;

class ResetUserPasswordAction
{
    public function __construct(ResetUserPasswordResponder $responder, ResetUserPasswordService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(User $user, $token, ResetUserPasswordFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($user, $token, $request->validated())
        )->respond();
    }
}
