<?php

namespace App\Users\Actions;

use App\Users\Domain\Requests\LoginUserFormRequest;
use App\Users\Domain\Services\LoginUserService;
use App\Users\Responders\LoginUserResponder;

class LoginUserAction
{
    public function __construct(LoginUserResponder $responder, LoginUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;

    }
    public function __invoke(LoginUserFormRequest $request)
    {

        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
