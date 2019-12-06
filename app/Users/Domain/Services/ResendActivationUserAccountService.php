<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Events\ResendActivation;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\UserRepository;
class ResendActivationUserAccountService extends Service
{
    protected $users;
    protected $activations;
    public function __construct(UserRepository $users,ActivationRepository $activations)
    {
        $this->users = $users;
        $this->activations=$activations;
    }
    public function handle($user = [])
    {
        $this->activations->regenerateToken($user);
        event(new ResendActivation($user));
        return new GenericPayload($user);
    }
}
