<?php

namespace App\Users\Actions;

use App\Users\Domain\Services\GetAuthenticatedUserService;
use App\Users\Responders\GetAuthenticatedUserResponder;

class GetAuthenticatedUserAction
{
    public function __construct(GetAuthenticatedUserResponder $responder, GetAuthenticatedUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke()
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}
