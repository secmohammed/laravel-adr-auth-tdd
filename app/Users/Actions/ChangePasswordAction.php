<?php

namespace App\Users\Actions;

use App\Users\Domain\Requests\ChangePasswordFormRequest;
use App\Users\Domain\Services\ChangePasswordService;
use App\Users\Responders\ChangePasswordResponder;

class ChangePasswordAction
{
    public function __construct(ChangePasswordResponder $responder, ChangePasswordService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(ChangePasswordFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
