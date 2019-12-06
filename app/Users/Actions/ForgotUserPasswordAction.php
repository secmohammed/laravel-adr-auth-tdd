<?php

namespace App\Users\Actions;

use App\Users\Domain\Requests\ForgotUserPasswordFormRequest;
use App\Users\Domain\Services\ForgotUserPasswordService;
use App\Users\Responders\ForgotUserPasswordResponder;

class ForgotUserPasswordAction
{
    public function __construct(ForgotUserPasswordResponder $responder, ForgotUserPasswordService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(ForgotUserPasswordFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
