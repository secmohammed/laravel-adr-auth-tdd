<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;

class LoginUserService extends Service
{
    public function handle($data = [])
    {

        if (auth()->attempt($data) && ($isActivated = auth()->user()->isActivated())) {
            return new GenericPayload(auth()->user());
        }

        if (isset($isActivated) && !$isActivated) {
            auth()->logout();
            return new UnauthorizedPayload([
                'message' => 'User is not activated yet.',
            ]);
        }
        return new UnauthorizedPayload;
    }
}
